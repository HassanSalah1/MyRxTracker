<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnTrackPack extends Model
{

    protected $fillable = [
        'user_id',
        'doctor_id',
        'doctor_name',
        'pack_id',
        'application_date',
        'next_consultation_date',
        'receipt_path',
        'verification_status', // 'pending', 'approved', 'rejected'
        'used_for_redemption', // boolean to track if this purchase was used in a redemption
    ];

    protected $casts = [
        'application_date' => 'datetime',
        'next_consultation_date' => 'datetime',
        'used_for_redemption' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
}
