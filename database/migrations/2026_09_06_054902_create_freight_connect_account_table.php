<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('freight_connect_account', function (Blueprint $table) {

            $table->id();

            // Account Information
            $table->string('business_email')->unique();
            $table->string('password');

            // Company Information
            $table->string('company');
            $table->string('website')->nullable();
            $table->string('country');

            // Business Type
            $table->json('business_type')->nullable();

            // Contact Information
            $table->string('contact');
            $table->string('contact_email');
            $table->string('phone')->nullable();
            $table->string('phone_full')->nullable();
            $table->string('phone_dial_code')->nullable();

            // Product Categories
            $table->json('product_categories')->nullable();

            // Agreement
            $table->timestamp('terms_accepted_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freight_connect_account');
    }
};