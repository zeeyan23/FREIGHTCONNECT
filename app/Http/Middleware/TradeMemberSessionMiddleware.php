<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TradeMemberLogin;
use Symfony\Component\HttpFoundation\Response;

class TradeMemberSessionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $cookieName = 'freightconnect_trade_member';
        $token = $request->cookie($cookieName);

        $guard = Auth::guard('trade_member');

        // No Trade Member authentication cookie.
        if (!$token) {
            if ($guard->check()) {
                $guard->logout();
            }

            return $next($request);
        }

        // Find the device login using the hashed token.
        $login = TradeMemberLogin::with([
            'credential.traderMemberAccount'
        ])
            ->where('remember_token_hash', hash('sha256', $token))
            ->whereNull('revoked_at')
            ->first();

        // Validate the device login.
        $invalid = !$login
            || !$login->credential
            || !$login->credential->traderMemberAccount
            || $login->expires_at->isPast()
            || $login->last_activity_at->lte(now()->subDays(14))
            || (
                $login->remember_until !== null
                && $login->remember_until->isPast()
            )
            || strtolower(
                $login->credential->traderMemberAccount->application_status
            ) !== 'approved';

        if ($invalid) {
            if ($login) {
                $login->update(['revoked_at' => now()]);
            }

            if ($guard->check()) {
                $guard->logout();
            }

            return $next($request)->withCookie(
                cookie()->forget($cookieName, '/', config('session.domain'))
            );
        }

        // Restore Trade Member authentication if necessary.
        if (
            !$guard->check()
            || $guard->id() !== $login->trade_member_credential_id
        ) {
            $guard->login($login->credential);

            $request->session()->regenerate();
        }

        // Extend the inactivity expiry after activity.
        $login->update([
            'last_activity_at' => now(),
            'expires_at' => now()->addDays(14),
        ]);

        return $next($request);
    }
}