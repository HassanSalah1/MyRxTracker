<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class DownloadSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public ?string $header_image_en;
    public ?string $header_secondary_image_en;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public ?string $header_image_zh;
    public ?string $header_secondary_image_zh;
    
    // Tab Content - English
    public string $tab_1_title_en;
    public string $tab_2_title_en;
    public string $download_text_en;
    public string $download_link_1_en;
    public string $download_link_2_en;
    
    // Tab Content - Chinese
    public string $tab_1_title_zh;
    public string $tab_2_title_zh;
    public string $download_text_zh;
    public string $download_link_1_zh;
    public string $download_link_2_zh;
    
    // Meta Information - English
    public string $meta_title_en;
    public string $meta_description_en;
    public ?string $meta_keywords_en;
    
    // Meta Information - Chinese
    public string $meta_title_zh;
    public string $meta_description_zh;
    public ?string $meta_keywords_zh;
    
    // SEO
    public ?string $og_title_en;
    public ?string $og_description_en;
    public ?string $og_title_zh;
    public ?string $og_description_zh;
    public ?string $og_image;

    public static function group(): string
    {
        return 'download';
    }

    // Helper methods to get localized content
    public function getHeaderTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_title_zh : $this->header_title_en;
    }

    public function getHeaderImage(): string
    {
        $value = app()->getLocale() === 'zh' ? ($this->header_image_zh ?? null) : ($this->header_image_en ?? null);
        if (empty($value)) {
            $value = '/front-end/images/EfficacyProfile2.png';
        }
        return $this->toUrl($value);
    }

    public function getHeaderSecondaryImage(): string
    {
        $value = app()->getLocale() === 'zh' ? ($this->header_secondary_image_zh ?? null) : ($this->header_secondary_image_en ?? null);
        if (empty($value)) {
            $value = '/front-end/images/Patient.png';
        }
        return $this->toUrl($value);
    }

    public function getTabTitle(int $tabNumber): string
    {
        $property = "tab_{$tabNumber}_title_" . app()->getLocale();
        return $this->$property ?? $this->{"tab_{$tabNumber}_title_en"};
    }

    public function getDownloadText(): string
    {
        return app()->getLocale() === 'zh' ? $this->download_text_zh : $this->download_text_en;
    }

    public function getDownloadLink(int $linkNumber): string
    {
        $property = "download_link_{$linkNumber}_" . app()->getLocale();
        return $this->$property ?? $this->{"download_link_{$linkNumber}_en"};
    }

    public function getMetaTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->meta_title_zh : $this->meta_title_en;
    }

    public function getMetaDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->meta_description_zh : $this->meta_description_en;
    }

    public function getMetaKeywords(): string
    {
        $value = app()->getLocale() === 'zh' ? $this->meta_keywords_zh : $this->meta_keywords_en;
        return $value ?? '';
    }

    public function getOgTitle(): string
    {
        $value = app()->getLocale() === 'zh' ? $this->og_title_zh : $this->og_title_en;
        return $value ?? '';
    }

    public function getOgDescription(): string
    {
        $value = app()->getLocale() === 'zh' ? $this->og_description_zh : $this->og_description_en;
        return $value ?? '';
    }

    protected function toUrl(?string $path): string
    {
        if (empty($path)) {
            return '';
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        if (str_starts_with($path, '/')) {
            return asset($path);
        }
        return asset('storage/' . ltrim($path, '/'));
    }
}
