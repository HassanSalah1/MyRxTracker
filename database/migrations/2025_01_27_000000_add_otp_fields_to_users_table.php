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
        Schema::table('users', function (Blueprint $table) {
            $afterColumn = Schema::hasColumn('users', 'notification_permission')
                ? 'notification_permission'
                : 'email'; // fallback if notification_permission not present yet

            $table->string('otp_code')->nullable()->after($afterColumn);
            $table->timestamp('otp_expires_at')->nullable()->after('otp_code');
            $table->integer('otp_attempts')->default(0)->after('otp_expires_at');
            $table->timestamp('otp_locked_until')->nullable()->after('otp_attempts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['otp_code', 'otp_expires_at', 'otp_attempts', 'otp_locked_until']);
        });
    }
};
