
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trade_member_otps', function (Blueprint $table) {
            $table->id();

            // Link OTP to the registered Trade Member
            $table->foreignId('trader_member_account_id')
                ->constrained('trader_member_account')
                ->cascadeOnDelete();

            // Store only the hashed OTP
            $table->string('otp_hash');

            // OTP expiration and verification
            $table->timestamp('expires_at');
            $table->timestamp('verified_at')->nullable();

            // Track incorrect attempts
            $table->unsignedTinyInteger('attempts')->default(0);

            $table->timestamps();

            $table->index(['trader_member_account_id', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trade_member_otps');
    }
};
