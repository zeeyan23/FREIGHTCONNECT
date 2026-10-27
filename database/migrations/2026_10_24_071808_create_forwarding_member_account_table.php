
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forwarding_member_account', function (Blueprint $table) {
            $table->id();

            // Company information
            $table->string('company_name')->nullable();
            $table->string('business_email')->unique();
            $table->string('phone')->nullable();
            $table->string('phone_full')->nullable();
            $table->string('phone_dial_code')->nullable();
            $table->string('country')->nullable();
            $table->string('city');
            $table->text('registered_business_address');

            $table->string('company_logo')->nullable();
            $table->string('company_website');
            $table->string('years_in_business');

            // Contact person
            $table->string('contact_person_name');
            $table->string('contact_person_designation');
            $table->string('contact_person_email');
            $table->boolean('whatsapp_available')->default(false);

            // Business operations
            $table->json('services')->nullable();
            $table->text('trade_lanes');
            $table->json('cargo_capabilities')->nullable();
            $table->text('markets_to_develop');
            $table->string('verification_type');
            $table->json('verification_documents')->nullable();
            $table->string('business_activity_document')->nullable();

            // Associations and support
            $table->boolean('association_member')->default(false);
            $table->text('association_details')->nullable();
            $table->boolean('payment_recovery_support')->default(false);
            $table->string('referral')->nullable();

            // Business reference
            $table->string('reference_company_name');
            $table->string('reference_country');
            $table->string('reference_company_website')->nullable();
            $table->string('reference_contact_person');
            $table->string('reference_designation');
            $table->string('reference_business_email');
            $table->string('reference_phone');
            $table->string('reference_phone_full')->nullable();
            $table->string('reference_phone_dial_code')->nullable();
            $table->string('reference_relationship');
            $table->string('reference_relationship_duration');
            $table->date('reference_last_transaction_date')->nullable();

            // Declarations
            $table->boolean('information_accuracy_confirmed')
                ->default(false);
            $table->boolean('verification_authorization_confirmed')
                ->default(false);

            // Membership and application status
            $table->string('membership_status')->default('pending');
            $table->boolean('membership_terms_accepted')->default(false);

            $table->string('application_status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forwarding_member_account');
    }
};
