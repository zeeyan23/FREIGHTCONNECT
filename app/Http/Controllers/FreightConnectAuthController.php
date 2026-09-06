<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreightConnectLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreightConnectAuthController extends Controller
{
    public function login(FreightConnectLoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = [
            'business_email' => $validated['email'],
            'password' => $validated['password'],
        ];

        if (!Auth::guard('freightconnect')->attempt($credentials)) {

            return back()
                ->withErrors([
                    'email' => 'The email or password you entered is incorrect.',
                ])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        return redirect($validated['redirect'] ?? route('freightconnect.dashboard'));
    }

    /**
     * Log out the FreightConnect account.
     */
    public function logout(Request $request)
    {
        Auth::guard('freightconnect')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
