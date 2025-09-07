<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class TermsPolicySettings extends Settings
{
    public string $title_en;
    public string $content_en;
    public string $title_zh;
    public string $content_zh;

    public static function group(): string
    {
        return 'terms_policy';
    }

    public function getTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->title_zh : $this->title_en;
    }

    public function getContent(): string
    {
        return app()->getLocale() === 'zh' ? $this->content_zh : $this->content_en;
    }
}


