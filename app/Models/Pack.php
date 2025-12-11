<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $fillable = [
        'name_en',
        'name_zh',
        'description_en',
        'description_zh',
        'image',
        'number_of_purchases',
        'number_of_free',
        'from_date',
        'to_date',
    ];
    public function getNameAttribute()
    {
        $locale = app()->getLocale(); // Get the current application locale
        return $this->{"name_{$locale}"}; // Dynamically access the name_en or name_zh attribute
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
