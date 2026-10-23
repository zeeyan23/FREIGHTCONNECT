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
        'business_type',
        'products',
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
        'exporting_to',
        'importing_from',
        'buyers_in',
        'suppliers_in',
        'logistics_services',
        'shipment_frequency',
        'has_requirement',
        'requirement_description',
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
        'membership_terms',
        'information_accuracy',
        'verification_authorization',
        'application_status'
    ];

    protected $casts = [
        'logistics_services' => 'array',
        'membership_terms' => 'boolean',
        'information_accuracy'  => 'boolean',
        'verification_authorization'  => 'boolean',
        'business_types' => 'array',
        'business_interests' => 'array',
        'has_specific_requirement' => 'boolean',
        'needs_logistics_support' => 'boolean',
    ];
}