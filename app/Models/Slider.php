<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [ 'image', 'image_zh'];

//    public function getImageAttribute()
//    {
//        $locale = app()->getLocale();
//        return $locale == 'en' ? $this->{'image'} : $this->{"image_zh"};
//    }
}
