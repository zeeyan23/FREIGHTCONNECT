<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class FreightConnectAccount extends Authenticatable
{
    protected $table = 'freight_connect_account';

    protected $fillable = [
        'business_email',
        'password',
        'company',
        'website',
        'country',
        'business_type',
        'contact',
        'contact_email',
        'phone',
        'phone_full',
        'phone_dial_code',
        'product_categories',
        'group_type_id',
        'terms_accepted_at',
    ];

    protected $casts = [
        'business_type' => 'array',
        'product_categories' => 'array',
        'terms_accepted_at' => 'datetime',
    ];
}