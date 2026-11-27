<?php

namespace App\Http\Controllers;

use App\Mail\TradeMemberOtpMail;
use App\Models\TraderMemberAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

use App\Mail\TradeMemberPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TradeMemberAuthController extends Controller
{
    public function requestOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $email = strtolower(trim($request->email));

        // Limit OTP requests to 3 attempts per 10 minutes.
        $rateLimitKey = 'trade-member-otp:' . hash('sha256', $email . '|' . $request->ip());

        if (RateLimiter::tooManyAttempts($rateLimitKey, 10)) {
            return response()->json([
                'message' => 'Too many OTP requests. Please try again later.',
            ], 429);
        }

        RateLimiter::hit($rateLimitKey, 600);

        // Find the registered Trade Member.
        $member = TraderMemberAccount::where('business_email', $email)->first();

        // Continue only if the account exists and is approved.
        if (
            !$member ||
            strtolower($member->application_status) !== 'approved' ||
            $member->credentials()->exists()
        ) {
            return response()->json([
                'message' => 'If your account is eligible, a verification code will be sent to your registered email.',
            ]);
        }

        // Generate a six-digit OTP.
        $otp = (string) random_int(100000, 999999);

        // Remove previous unverified OTPs.
        $member->otps()->whereNull('verified_at')->delete();

        // Store the hashed OTP with a five-minute expiry.
        $otpRecord = $member->otps()->create([
            'otp_hash' => Hash::make($otp),
            'expires_at' => now()->addMinutes(5),
        ]);

        try {
            Mail::to($member->business_email)
                ->send(new TradeMemberOtpMail($otp));
        } catch (\Throwable $exception) {
            // Remove the OTP if the email could not be sent.
            $otpRecord->delete();

            report($exception);

            return response()->json([
                'message' => 'Unable to send the verification email. Please try again later.',
            ], 500);
        }

        return response()->json([
            'message' => 'A verification code has been sent to your registered email address.',
        ]);
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'otp' => ['required', 'digits:6'],
        ]);

        $email = strtolower(trim($request->email));

        $member = TraderMemberAccount::where('business_email', $email)
            ->whereRaw('LOWER(application_status) = ?', ['approved'])
            ->first();

        if (!$member) {
            return response()->json([
                'message' => 'Invalid or expired verification code.',
            ], 422);
        }

        if ($member->credentials()->exists()) {
            return response()->json([
                'message' => 'Your Trade Member account is already activated. Please log in.',
            ], 409);
        }

        try {
            $result = DB::transaction(function () use ($member, $request) {

                $otpRecord = $member->otps()
                    ->whereNull('verified_at')
                    ->latest()
                    ->lockForUpdate()
                    ->first();

                if (!$otpRecord || $otpRecord->expires_at->isPast()) {
                    return 'expired';
                }

                if ($otpRecord->attempts >= 5) {
                    return 'attempts_exceeded';
                }

                if (!Hash::check($request->otp, $otpRecord->otp_hash)) {
                    $otpRecord->increment('attempts');

                    return 'invalid';
                }

                // Generate an 8-character password.
                $password = Str::password(8);

                // Create the Trade Member credentials.
                $credential = $member->credentials()->create([
                    'password' => $password,
                    'email_verified_at' => now(),
                ]);

                // Send the generated password.
                Mail::to($member->business_email)
                    ->send(new TradeMemberPasswordMail($password));

                // Mark the OTP as verified.
                $otpRecord->update([
                    'verified_at' => now(),
                ]);

                return 'success';
            });

        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'message' => 'Unable to complete account activation. Please try again later.',
            ], 500);
        }

        if ($result === 'expired') {
            return response()->json([
                'message' => 'Your verification code has expired. Please request a new one.',
            ], 422);
        }

        if ($result === 'attempts_exceeded') {
            return response()->json([
                'message' => 'Too many incorrect attempts. Please request a new verification code.',
            ], 429);
        }

        if ($result === 'invalid') {
            return response()->json([
                'message' => 'Incorrect verification code.',
            ], 422);
        }

        return response()->json([
            'message' => 'Email verified successfully. Your login password has been sent to your registered email.',
        ]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $email = strtolower(trim($request->email));

        // Find an approved Trade Member.
        $member = TraderMemberAccount::where('business_email', $email)
            ->whereRaw('LOWER(application_status) = ?', ['approved'])
            ->first();

        if (!$member) {
            return response()->json([
                'message' => 'Invalid email or password.',
            ], 401);
        }

        // Retrieve associated credentials.
        $credential = $member->credentials;

        if (!$credential || !Hash::check($request->password, $credential->password)) {
            return response()->json([
                'message' => 'Invalid email or password.',
            ], 401);
        }

        // Generate a secure authentication token.
        $token = Str::random(64);

        // Determine whether this device should be remembered.
        $remember = $request->boolean('remember');

        $now = now();

        // Authenticate using the Trade Member guard.
        auth('trade_member')->login($credential);

        // Regenerate the Laravel session ID.
        $request->session()->regenerate();

        // Create a separate login/device record.
        $credential->logins()->create([
            'logged_in_at' => $now,
            'last_activity_at' => $now,
            'remember_until' => $remember
                ? $now->copy()->addDays(30)
                : null,
            'remember_token_hash' => hash('sha256', $token),
            'expires_at' => $now->copy()->addDays(14),
        ]);

        $authCookie = new \Symfony\Component\HttpFoundation\Cookie(
            'freightconnect_trade_member',
            $token,
            $remember ? now()->addDays(30) : 0,
            '/',
            config('session.domain'),
            config('session.secure') ?? $request->isSecure(),
            true,
            false,
            'lax'
        );

        return response()->json([
            'message' => 'Login successful.',
            'redirect' => route('search.suppliers'),
        ])->cookie($authCookie);
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('freightconnect_trade_member');

        if ($token) {
            \App\Models\TradeMemberLogin::where(
                'remember_token_hash',
                hash('sha256', $token)
            )->whereNull('revoked_at')->update([
                'revoked_at' => now(),
            ]);
        }

        auth('trade_member')->logout();

        $request->session()->regenerateToken();

        $response = $request->expectsJson()
            ? response()->json([
                'message' => 'Logged out successfully.',
            ])
            : redirect()->back()->with('status', 'Logged out successfully.');

        return $response->withCookie(cookie()->forget(
            'freightconnect_trade_member',
            '/',
            config('session.domain')
        ));
    }

}
