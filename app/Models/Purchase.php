<?php

namespace App\Models;

use App\Enums\ProgramStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'doctor_name',
        'serial_number',
        'purchase_date',
        'receipt_path',
        'status',
        'admin_notes',
        'approved_at',
        'approved_by',
        'redemption_serial_number',
        'redemption_doctor_name',
        'redemption_date',
        'redeemed_at',
    ];

    protected $casts = [
        'status' => ProgramStatus::class,
        'purchase_date' => 'date',
        'redemption_date' => 'date',
        'approved_at' => 'datetime',
        'redeemed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function scopePending($query)
    {
        return $query->where('status', ProgramStatus::PENDING_APPROVAL);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', ProgramStatus::APPROVED);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', ProgramStatus::COMPLETED);
    }
}
