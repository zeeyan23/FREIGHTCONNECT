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
            $table->dropColumn([
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
                'other_business_type',
                'other_logistics_service'
            ]);

            $table->string('referral')->nullable()->after('application_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trader_member_account', function (Blueprint $table) {
            //
        });
    }
};
