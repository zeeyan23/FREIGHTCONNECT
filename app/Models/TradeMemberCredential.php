<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TradeMemberCredential extends Authenticatable
{
    protected $table = 'trade_member_credentials';

    protected $fillable = [
        'trader_member_account_id',
        'password',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
        ];
    }

    public function traderMemberAccount(): BelongsTo
    {
        return $this->belongsTo(
            TraderMemberAccount::class,
            'trader_member_account_id'
        );
    }


    public function logins(): HasMany
    {
        return $this->hasMany(TradeMemberLogin::class);
    }
}
