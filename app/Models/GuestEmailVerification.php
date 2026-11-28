<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestEmailVerification extends Model
{
    protected $fillable = [
        'email',
        'session_hash',
        'otp_hash',
        'expires_at',
        'verified_at',
        'attempts',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'verified_at' => 'datetime',
        ];
    }
}
