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
        Schema::table('trader_member_account', function (Blueprint $table) {

            // Company Information
            $table->string('company_name');
            $table->string('company_website');
            $table->string('country', 10);
            $table->string('business_type');
            $table->text('products');

            // Trade & Market Information
            $table->text('exporting_to');
            $table->text('importing_from');
            $table->text('buyers_in');
            $table->text('suppliers_in');

            // Logistics Requirements
            $table->json('logistics_services');
            $table->string('shipment_frequency')->nullable();

            // Current Trade Requirement
            $table->string('has_requirement');
            $table->text('requirement_description')->nullable();

            // Business Verification
            $table->string('document_type');
            $table->string('verification_document');

            // Contact Information
            $table->string('contact_person');
            $table->string('designation');
            $table->string('business_email')->unique();
            $table->string('business_phone');

            // Referral
            $table->string('referral_id')->nullable();

            // Membership Agreement
            $table->boolean('membership_terms')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trader_member_account', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'company_website',
                'country',
                'business_type',
                'products',
                'exporting_to',
                'importing_from',
                'buyers_in',
                'suppliers_in',
                'logistics_services',
                'shipment_frequency',
                'has_requirement',
                'requirement_description',
                'document_type',
                'verification_document',
                'contact_person',
                'designation',
                'business_email',
                'business_phone',
                'referral_id',
                'membership_terms',
            ]);
        });
    }
};