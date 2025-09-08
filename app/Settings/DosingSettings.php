<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class DosingSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public ?string $header_image_en;
    public ?string $header_secondary_image_en;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public ?string $header_image_zh;
    public ?string $header_secondary_image_zh;
    
    // Dosing Instructions - English
    public string $dosing_item_1_en;
    public string $dosing_item_2_en;
    public string $dosing_item_3_en;
    public string $dosing_item_4_en;
    
    // Dosing Instructions - Chinese
    public string $dosing_item_1_zh;
    public string $dosing_item_2_zh;
    public string $dosing_item_3_zh;
    public string $dosing_item_4_zh;
    
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

    // References Section - English
    public string $references_title_en;
    public string $reference_1_en;
    
    // References Section - Chinese
    public string $references_title_zh;
    public string $reference_1_zh;

    // Pack image shown mid page
    public ?string $pack_image;

    public static function group(): string
    {
        return 'dosing';
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
            $value = '/front-end/images/Dosing.png';
        }
        return $this->toUrl($value);
    }

    public function getHeaderSecondaryImage(): string
    {
        $value = app()->getLocale() === 'zh' ? ($this->header_secondary_image_zh ?? null) : ($this->header_secondary_image_en ?? null);
        if (empty($value)) {
            $value = '/front-end/images/EfficacyProfile2.png';
        }
        return $this->toUrl($value);
    }

    public function getDosingItem(int $itemNumber): string
    {
        $property = "dosing_item_{$itemNumber}_" . app()->getLocale();
        return $this->$property ?? $this->{"dosing_item_{$itemNumber}_en"};
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

    public function getReferencesTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->references_title_zh : $this->references_title_en;
    }

    public function getReference(int $referenceNumber): string
    {
        $property = "reference_{$referenceNumber}_" . app()->getLocale();
        return $this->$property ?? $this->{"reference_{$referenceNumber}_en"};
    }

    public function getPackImage(): string
    {
        $value = $this->pack_image ?? null;
        if (empty($value)) {
            $value = '/front-end/images/lumirix_pack.png';
        }
        return $this->toUrl($value);
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
