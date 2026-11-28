<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_email_verifications', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->string('session_hash', 64);

            // Store only the hashed OTP
            $table->string('otp_hash');

            // OTP expiration and verification
            $table->timestamp('expires_at');
            $table->timestamp('verified_at')->nullable();

            // Track incorrect attempts
            $table->unsignedTinyInteger('attempts')->default(0);

            $table->timestamps();

            $table->index(['email', 'session_hash']);
            $table->index('expires_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_email_verifications');
    }
};
