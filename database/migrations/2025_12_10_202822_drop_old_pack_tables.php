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
        Schema::dropIfExists('redeeming_packs');
        Schema::dropIfExists('on_track_packs');
        Schema::dropIfExists('starter_packs');
        Schema::dropIfExists('user_packs');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Note: This migration is for fresh start, so we don't recreate old tables
        // If rollback is needed, old migrations should be re-run
    }
};
