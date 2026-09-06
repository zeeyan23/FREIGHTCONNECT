<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreightConnectAccountRegisterRequest;
use App\Models\FreightConnectAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FreightConnectAccountController extends Controller
{
    /**
     * Store a newly registered FreightConnect account.
     */

    public function register(FreightConnectAccountRegisterRequest $request)
    {
        $validated = $request->validated();

        $account = FreightConnectAccount::create([
            'business_email' => $validated['business_email'],
            'password' => Hash::make($validated['password']),

            'company' => $validated['company'],
            'website' => $validated['website'] ?? null,
            'country' => $validated['country'],

            'business_type' => $validated['business_type'],

            'contact' => $validated['contact'],
            'contact_email' => $validated['contact_email'],
            'phone' => $validated['phone'],
            'phone_full' => $validated['phone_full'],
            'phone_dial_code' => $validated['phone_dial_code'],

            'product_categories' => $validated['product_categories'],

            'terms_accepted_at' => now(),
        ]);

        Auth::guard('freightconnect')->login($account);

        $request->session()->regenerate();

        if (!empty($validated['redirect'])) {
            return redirect($validated['redirect'])
                ->with('success', 'Your FreightConnect account has been created successfully.');
        }

        return redirect()
            ->route('login')
            ->with('success', 'Your FreightConnect account has been created successfully. Please log in.');
    }
}