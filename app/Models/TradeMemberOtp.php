<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TradeMemberOtp extends Model
{
    protected $table = 'trade_member_otps';

    protected $fillable = [
        'trader_member_account_id',
        'otp_hash',
        'expires_at',
        'verified_at',
        'attempts',
    ];

    protected $hidden = [
        'otp_hash',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'verified_at' => 'datetime',
        ];
    }

    public function traderMemberAccount(): BelongsTo
    {
        return $this->belongsTo(
            TraderMemberAccount::class,
            'trader_member_account_id'
        );
    }
}
