<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForwardingMemberAccount extends Model
{
    protected $table = 'forwarding_member_account';

    protected $fillable = [
        'company_name',
        'country',
        'city',
        'contact_person_name',
        'contact_person_designation',
        'business_email',
        'phone',
        'phone_full',
        'phone_dial_code',
        'company_website',
        'years_in_business',
        'services',
        'trade_lanes',
        'cargo_capabilities',
        'markets_to_develop',
        'verification_type',
        'verification_documents',
        'association_member',
        'association_details',
        'payment_recovery_support',
        'referral',
        'membership_status',
        'membership_terms_accepted',
        'membership_terms_accepted_at',
        'membership_terms_version',
    ];

    protected $casts = [
        'services' => 'array',
        'cargo_capabilities' => 'array',
        'markets_to_develop' => 'array',
        'verification_documents' => 'array',
        'association_member' => 'boolean',
        'payment_recovery_support' => 'boolean',
        'membership_terms_accepted' => 'boolean',
        'membership_terms_accepted_at' => 'datetime',
    ];
}
