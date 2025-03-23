<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\PacksStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('on_track_packs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->onDelete('cascade');
            $table->foreignId('pack_id')->constrained('packs');
            $table->date('application_date');
            $table->date('next_consultation_date');
            $table->string('receipt_path')->nullable();
            $table->enum('verification_status', PacksStatus::values())->default(PacksStatus::PENDING->value);
            $table->boolean('used_for_redemption')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('on_track_packs');
    }
};
