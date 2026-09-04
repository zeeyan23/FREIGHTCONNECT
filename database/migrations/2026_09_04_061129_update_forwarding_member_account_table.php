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
        Schema::table('forwarding_member_account', function (Blueprint $table) {

            $table->dropColumn([
                'business_type',
                'products',
                'country_iso'
            ]);

            $table->renameColumn('company', 'company_name');
            $table->renameColumn('email', 'business_email');
            $table->renameColumn('full_phone', 'phone_full');
            $table->renameColumn('dial_code', 'phone_dial_code');

            $table->string('city')->after('country');

            $table->string('contact_person_name')->after('city');
            $table->string('contact_person_designation')->after('contact_person_name');

            $table->string('company_website')->after('phone');
            $table->string('years_in_business')->after('company_website');

            $table->json('services')->nullable()->after('years_in_business');
            $table->text('trade_lanes')->after('services');
            $table->json('cargo_capabilities')->nullable()->after('trade_lanes');

            $table->text('markets_to_develop')->after('cargo_capabilities');

            $table->string('verification_type')->after('markets_to_develop');
            $table->json('verification_documents')->nullable()->after('verification_type');

            $table->boolean('association_member')->default(false)->after('verification_documents');
            $table->text('association_details')->nullable()->after('association_member');
            $table->boolean('payment_recovery_support')->default(false)->after('association_details');

            $table->string('referral')->nullable()->after('payment_recovery_support');

            $table->string('membership_status')->default('pending')->after('referral');
            $table->boolean('membership_terms_accepted')->default(false)->after('membership_status');
            $table->timestamp('membership_terms_accepted_at')->nullable()->after('membership_terms_accepted');
            $table->string('membership_terms_version')->nullable()->after('membership_terms_accepted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forwarding_member_account', function (Blueprint $table) {

            $table->dropColumn([
                'city',
                'contact_person_name',
                'contact_person_designation',
                'company_website',
                'years_in_business',
                'services',
                'trade_lanes',
                'cargo_capabilities',
                'markets_to_develop',
                'verification_type',
                'verification_documents',
                'association_member',
                'association_details',
                'payment_recovery_support',
                'referral',
                'membership_status',
                'membership_terms_accepted',
                'membership_terms_accepted_at',
                'membership_terms_version',
            ]);

            $table->renameColumn('company_name', 'company');
            $table->renameColumn('business_email', 'email');
            $table->renameColumn('phone_full', 'full_phone');
            $table->renameColumn('phone_dial_code', 'dial_code');

            $table->string('business_type')->nullable();
            $table->text('products')->nullable();
            $table->text('country_iso')->nullable();
        });
    }
};
