<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('freight_connect_account', function (Blueprint $table) {
            $table->foreignId('group_type_id')
                ->nullable()
                ->constrained('group_types')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        // Nothing to rollback because the original migration was empty.
    }
};