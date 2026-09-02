<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class leads extends Model
{
    protected $fillable = [
        'company',
        'contact_person',
        'email',
        'phone',
        'full_phone',
        'dial_code',
        'country_iso',
        'country',
        'business_type',
        'products'
    ];
}
