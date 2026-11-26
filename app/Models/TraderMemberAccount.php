<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraderMemberAccount extends Model
{
    protected $table = 'trader_member_account';

    protected $fillable = [
        'company_name',
        'country',
        'city',
        'business_address',
        'business_email',
        'company_website',
        'company_logo',
        'contact_person',
        'designation',
        'contact_person_email',
        'phone',
        'phone_full',
        'phone_dial_code',
        'whatsapp_available',
        'business_interests',
        'business_interest_other',
        'has_specific_requirement',
        'needs_logistics_support',
        'business_types',
        'business_type_other',
        'products_dealt',
        'current_trade_countries',
        'target_trade_markets',
        'company_registration_document',
        'business_activity_document',
        'reference_company_name',
        'reference_country',
        'reference_company_website',
        'reference_contact_person',
        'reference_email',
        'reference_phone',
        'reference_phone_full',
        'reference_phone_dial_code',
        'nature_of_relationship',
        'business_relationship_duration',
        'referral',
        'membership_terms',
        'information_accuracy',
        'verification_authorization',
        'application_status'
    ];

    protected $casts = [
        'membership_terms' => 'boolean',
        'information_accuracy'  => 'boolean',
        'verification_authorization'  => 'boolean',
        'business_types' => 'array',
        'business_interests' => 'array',
        'has_specific_requirement' => 'boolean',
        'needs_logistics_support' => 'boolean',
    ];

    public function credentials()
    {
        return $this->hasOne(TradeMemberCredential::class);
    }

    public function otps()
    {
        return $this->hasMany(TradeMemberOtp::class);
    }
}