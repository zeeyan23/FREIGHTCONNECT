<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraderMemberAccount extends Model
{
    protected $table = 'trader_member_account';

    protected $fillable = [
        'company_name',
        'company_website',
        'country',
        'business_type',
        'products',
        'exporting_to',
        'importing_from',
        'buyers_in',
        'suppliers_in',
        'logistics_services',
        'shipment_frequency',
        'has_requirement',
        'requirement_description',
        'document_type',
        'verification_document',
        'contact_person',
        'designation',
        'business_email',
        'phone',
        'phone_full',
        'phone_dial_code',
        'referral_id',
        'membership_terms',
    ];

    protected $casts = [
        'logistics_services' => 'array',
        'membership_terms' => 'boolean',
    ];
}