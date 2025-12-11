<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\ProgramStatus;
use App\Enums\Roles;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;
    use \App\Traits\HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'image',
        'mobile',
        'identity_number',
        'pack_id',
        'fcm_token',
        'notification_permission',
        'otp_code',
        'otp_expires_at',
        'otp_attempts',
        'otp_locked_until',
        'program_status',
    ];

    protected $casts = [
        'role' => Roles::class,
        'status' => UserStatus::class,
        'program_status' => ProgramStatus::class,
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }

    public function packs()
    {
        return $this->hasManyThrough(Pack::class, 'user_packs');
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }
    public function attendingEvents()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }
    public function photos()
    {
        return $this->hasMany(UserPhoto::class, 'user_id');
    }

}
