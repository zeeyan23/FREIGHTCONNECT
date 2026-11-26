<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trade_member_credentials', function (Blueprint $table) {
            $table->id();

            // Link credentials to the registered Trade Member
            $table->foreignId('trader_member_account_id')
                ->unique()
                ->constrained('trader_member_account')
                ->cascadeOnDelete();

            // Authentication details
            $table->string('password');

            // Email verification status
            $table->timestamp('email_verified_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trade_member_credentials');
    }
};
