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
            $table->dropColumn('business_phone');

            // Phone information
            $table->string('phone', 30);
            $table->string('phone_full', 30);
            $table->string('phone_dial_code', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trader_member_account', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'phone_full',
                'phone_dial_code',
            ]);

            $table->string('business_phone', 30);
        });
    }
};
