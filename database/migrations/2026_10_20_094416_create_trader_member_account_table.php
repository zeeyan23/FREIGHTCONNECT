
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trader_member_account', function (Blueprint $table) {
            $table->id();

            // Company information
            $table->string('company_name');
            $table->string('country', 10);
            $table->string('city')->nullable();
            $table->string('business_address');
            $table->string('business_email')->unique();
            $table->string('company_website');
            $table->string('company_logo')->nullable();

            // Business details
            $table->string('business_type');
            $table->text('products');

            // Contact information
            $table->string('contact_person');
            $table->string('designation');
            $table->string('contact_person_email');
            $table->string('phone', 30);
            $table->string('phone_full', 30);
            $table->string('phone_dial_code', 10);
            $table->boolean('whatsapp_available')->default(false);

            $table->longText('business_interests')->nullable();
            $table->string('business_interest_other')->nullable();
            $table->boolean('has_specific_requirement')->default(false);
            $table->boolean('needs_logistics_support')->default(false);
            $table->longText('business_types')->nullable();
            $table->string('business_type_other')->nullable();
            $table->text('products_dealt');
            $table->text('current_trade_countries')->nullable();
            $table->text('target_trade_markets')->nullable();
            $table->text('exporting_to');
            $table->text('importing_from');
            $table->text('buyers_in');
            $table->text('suppliers_in');

            // Logistics and requirements
            $table->longText('logistics_services');
            $table->string('shipment_frequency')->nullable();
            $table->string('has_requirement');
            $table->text('requirement_description')->nullable();
            

            // Documents
            $table->string('company_registration_document')->nullable();
            $table->string('business_activity_document')->nullable();

            // Business references
            $table->string('reference_company_name')->nullable();
            $table->string('reference_country')->nullable();
            $table->string('reference_company_website')->nullable();
            $table->string('reference_contact_person')->nullable();
            $table->string('reference_email')->nullable();
            $table->string('reference_phone', 50)->nullable();
            $table->string('reference_phone_full')->nullable();
            $table->string('reference_phone_dial_code')->nullable();
            $table->string('nature_of_relationship')->nullable();
            $table->string('business_relationship_duration')->nullable();

            // Consent and authorization
            $table->boolean('membership_terms')->default(false);
            $table->boolean('information_accuracy')->default(false);
            $table->boolean('verification_authorization')->default(false);
            $table->string('application_status')->default('pending');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trader_member_account');
    }
};
