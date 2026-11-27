
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trade_member_logins', function (Blueprint $table) {
            $table->string('remember_token_hash', 64)->nullable()->after('remember_until');
        });
    }

    public function down(): void
    {
        Schema::table('trade_member_logins', function (Blueprint $table) {
            $table->dropColumn('remember_token_hash');
        });
    }
};
