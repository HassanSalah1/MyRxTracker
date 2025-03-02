<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AppSettings extends Settings
{
        public string $days;
        public string $time;
        public string $address;
        public string $phone;
        public string $email;
        public string $app_version;
        public string $instagram;
        public string $facebook;
        public string $site_url;
        public string $x;
        public string $youtube;
        public string $mode;

    public static function group(): string
    {
        return 'app';
    }
}