
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('trade_member_logins', function (Blueprint $table) {
            $table->id();

            // Link login record to credentials
            $table->foreignId('trade_member_credential_id')
                ->constrained('trade_member_credentials')
                ->cascadeOnDelete();

            // Login and activity tracking
            $table->timestamp('logged_in_at')->useCurrent();
            $table->timestamp('last_activity_at')->useCurrent();
            $table->timestamp('remember_until')->nullable();
            $table->timestamp('expires_at')->useCurrent();
            $table->timestamp('revoked_at')->nullable();

            $table->timestamps();

            $table->index(['trade_member_credential_id', 'expires_at']);
            $table->index('last_activity_at');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('trade_member_logins');
    }
};
