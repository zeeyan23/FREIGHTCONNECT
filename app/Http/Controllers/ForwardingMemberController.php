<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreForwardingMemberRequest;
use App\Models\ForwardingMemberAccount;
use Illuminate\Http\Request;

class ForwardingMemberController extends Controller
{
    public function store(StoreForwardingMemberRequest $request)
    {
        
        $validated = $request->validated();

        $documentPaths = [];

        if ($request->hasFile('verification_documents')) {
            foreach ($request->file('verification_documents') as $document) {
                $documentPaths[] = $document->store(
                    'forwarding-members/verification-documents',
                    'public'
                );
            }
        }

        $marketsToDevelop = array_values(
            array_filter(
                array_map('trim', explode(',', $validated['markets_to_develop']))
            )
        );

        ForwardingMemberAccount::create([
            'company_name' => $validated['company_name'],
            'country' => $validated['country'],
            'city' => $validated['city'],

            'contact_person_name' => $validated['contact_person_name'],
            'contact_person_designation' => $validated['contact_person_designation'],

            'business_email' => $validated['business_email'],

            'phone' => $validated['phone'],
            'phone_full' => $validated['phone_full'],
            'phone_dial_code' => $validated['phone_dial_code'],

            'company_website' => $validated['company_website'],
            'years_in_business' => $validated['years_in_business'],

            'services' => $validated['services'],
            'trade_lanes' => $validated['trade_lanes'],
            'cargo_capabilities' => $validated['cargo_capabilities'],

            'markets_to_develop' => $marketsToDevelop,

            'verification_type' => $validated['verification_type'],
            'verification_documents' => $documentPaths,

            'association_member' => $validated['association_member'] === 'yes',
            'association_details' => $validated['association_details'] ?? null,

            'payment_recovery_support' =>
                $validated['payment_recovery_support'] === 'yes',

            'referral' => $validated['referral'] ?? null,

            'membership_status' => 'pending',

            'membership_terms_accepted' => true,
            'membership_terms_accepted_at' => now(),
            'membership_terms_version' => '1.0',
        ]);

        return redirect('/')
            ->with('success', 'Your membership application has been submitted successfully.');
    }
}
