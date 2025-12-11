<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ProgramStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('doctor_name');
            $table->string('serial_number')->unique();
            $table->date('purchase_date');
            $table->string('receipt_path');
            $table->enum('status', ProgramStatus::values())->default(ProgramStatus::PENDING_APPROVAL->value);
            $table->text('admin_notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('redemption_serial_number')->nullable();
            $table->string('redemption_doctor_name')->nullable();
            $table->date('redemption_date')->nullable();
            $table->timestamp('redeemed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
