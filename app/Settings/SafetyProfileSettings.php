<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SafetyProfileSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public string $header_subtitle_en;
    public string $header_image_en;
    public string $header_secondary_image_en;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public string $header_subtitle_zh;
    public string $header_image_zh;
    public string $header_secondary_image_zh;
    
    // Safety Points Section - English
    public string $safety_point_1_en;
    public string $safety_point_2_en;
    
    // Safety Points Section - Chinese
    public string $safety_point_1_zh;
    public string $safety_point_2_zh;
    
    // Adverse Reactions Section - English
    public string $adverse_title_en;
    public string $adverse_subtitle_en;
    public string $adverse_image_en;
    public string $adverse_note_1_en;
    public string $adverse_note_2_en;
    
    // Adverse Reactions Section - Chinese
    public string $adverse_title_zh;
    public string $adverse_subtitle_zh;
    public string $adverse_image_zh;
    public string $adverse_note_1_zh;
    public string $adverse_note_2_zh;
    
    // Meta Information - English
    public string $meta_title_en;
    public string $meta_description_en;
    public string $meta_keywords_en;
    
    // Meta Information - Chinese
    public string $meta_title_zh;
    public string $meta_description_zh;
    public string $meta_keywords_zh;
    
    // SEO
    public string $og_title_en;
    public string $og_description_en;
    public string $og_title_zh;
    public string $og_description_zh;
    public string $og_image;

    // References Section - English
    public string $references_title_en;
    public string $reference_1_en;
    
    // References Section - Chinese
    public string $references_title_zh;
    public string $reference_1_zh;

    public static function group(): string
    {
        return 'safety_profile';
    }

    // Helper methods to get localized content
    public function getHeaderTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_title_zh : $this->header_title_en;
    }

    public function getHeaderSubtitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_subtitle_zh : $this->header_subtitle_en;
    }

    public function getHeaderImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_image_zh : $this->header_image_en;
    }

    public function getHeaderSecondaryImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_secondary_image_zh : $this->header_secondary_image_en;
    }

    public function getSafetyPoint(int $pointNumber): string
    {
        $property = "safety_point_{$pointNumber}_" . app()->getLocale();
        return $this->$property ?? $this->{"safety_point_{$pointNumber}_en"};
    }

    public function getAdverseTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->adverse_title_zh : $this->adverse_title_en;
    }

    public function getAdverseSubtitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->adverse_subtitle_zh : $this->adverse_subtitle_en;
    }

    public function getAdverseImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->adverse_image_zh : $this->adverse_image_en;
    }

    public function getAdverseNote(int $noteNumber): string
    {
        $property = "adverse_note_{$noteNumber}_" . app()->getLocale();
        return $this->$property ?? $this->{"adverse_note_{$noteNumber}_en"};
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
        return app()->getLocale() === 'zh' ? $this->meta_keywords_zh : $this->meta_keywords_en;
    }

    public function getOgTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->og_title_zh : $this->og_title_en;
    }

    public function getOgDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->og_description_zh : $this->og_description_en;
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
}
