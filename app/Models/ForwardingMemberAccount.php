<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForwardingMemberAccount extends Model
{
    protected $table = 'forwarding_member_account';

    protected $fillable = [
        'company_name',
        'business_email',
        'phone',
        'phone_full',
        'phone_dial_code',
        'country',
        'city',
        'registered_business_address',
        'company_logo',
        'company_website',
        'years_in_business',
        'contact_person_name',
        'contact_person_designation',
        'contact_person_email',
        'whatsapp_available',
        'services',
        'trade_lanes',
        'cargo_capabilities',
        'markets_to_develop',
        'verification_type',
        'verification_documents',
        'business_activity_document',
        'association_member',
        'association_details',
        'payment_recovery_support',
        'referral',
        'reference_company_name',
        'reference_country',
        'reference_company_website',
        'reference_contact_person',
        'reference_designation',
        'reference_business_email',
        'reference_phone',
        'reference_phone_full',
        'reference_phone_dial_code',
        'reference_relationship',
        'reference_relationship_duration',
        'reference_last_transaction_date',
        'information_accuracy_confirmed',
        'verification_authorization_confirmed',
        'membership_status',
        'membership_terms_accepted',
        'application_status',
    ];

    protected $casts = [
        'services' => 'array',
        'cargo_capabilities' => 'array',
        'verification_documents' => 'array',
        'association_member' => 'boolean',
        'payment_recovery_support' => 'boolean',
        'membership_terms_accepted' => 'boolean',
        'information_accuracy_confirmed' => 'boolean',
        'verification_authorization_confirmed' => 'boolean',
        'reference_last_transaction_date' => 'date',
    ];
}
