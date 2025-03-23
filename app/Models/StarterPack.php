<?php

namespace App\Models;

use App\Enums\PacksStatus;
use App\Services\FirebaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class StarterPack extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'pack_id',
        'date_of_application',
        'verification_status',
        'serial_no',
        'certificate_path',
        'doctor_name'
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