<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TradeMemberLogin extends Model
{
    protected $table = 'trade_member_logins';

    protected $fillable = [
        'trade_member_credential_id',
        'logged_in_at',
        'last_activity_at',
        'remember_until',
        'remember_token_hash',
        'expires_at',
        'revoked_at',
    ];

    protected function casts(): array
    {
        return [
            'logged_in_at' => 'datetime',
            'last_activity_at' => 'datetime',
            'remember_until' => 'datetime',
            'expires_at' => 'datetime',
            'revoked_at' => 'datetime',
        ];
    }

    public function credential(): BelongsTo
    {
        return $this->belongsTo(
            TradeMemberCredential::class,
            'trade_member_credential_id'
        );
    }
}
