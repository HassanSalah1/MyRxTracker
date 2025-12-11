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
        Schema::table('redeeming_packs', function (Blueprint $table) {
            $table->date('redemption_date')->nullable()->change();
            $table->string('serial_number')->nullable()->change();
            $table->date('next_consultation_date')->nullable()->after('redemption_date');
            // Use string column to avoid dependency on removed enum
            $table->string('status')
                ->default('request')
                ->nullable()
                ->after('redemption_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('redeeming_packs', function (Blueprint $table) {
            //
        });
    }
};
