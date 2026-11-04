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
            $table->longText('other_logistics_service')->nullable()->after('services');
            $table->longText('other_cargo_service')->nullable()->after('cargo_capabilities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forwarding_member_account', function (Blueprint $table) {
            //
        });
    }
};
