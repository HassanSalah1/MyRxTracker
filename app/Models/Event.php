<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title_en',
        'title_zh',
        'description_en',
        'description_zh',
        'image',
    ];

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"};
    }
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"};
    }
    public function attendees()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
