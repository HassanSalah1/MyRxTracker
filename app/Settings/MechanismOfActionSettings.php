<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MechanismOfActionSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public ?string $header_image_en;
    public ?string $header_secondary_image_en;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public ?string $header_image_zh;
    public ?string $header_secondary_image_zh;
    
    // Section 1 - English
    public string $section_1_title_en;
    public string $section_1_content_en;
    public ?string $section_1_image_en;
    public ?string $section_1_caption_en;
    
    // Section 1 - Chinese
    public string $section_1_title_zh;
    public string $section_1_content_zh;
    public ?string $section_1_image_zh;
    public ?string $section_1_caption_zh;
    
    // Section 2 - English
    public string $section_2_title_en;
    public string $section_2_content_en;
    
    // Section 2 - Chinese
    public string $section_2_title_zh;
    public string $section_2_content_zh;
    
    // Section 3 - English
    public string $section_3_title_en;
    public string $section_3_content_en;
    public ?string $section_3_image_en;
    public ?string $section_3_caption_en;
    
    // Section 3 - Chinese
    public string $section_3_title_zh;
    public string $section_3_content_zh;
    public ?string $section_3_image_zh;
    public ?string $section_3_caption_zh;
    
    // Section 4 - English
    public string $section_4_title_en;
    public string $section_4_content_en;
    
    // Section 4 - Chinese
    public string $section_4_title_zh;
    public string $section_4_content_zh;
    
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
    public string $reference_2_en;
    public string $reference_3_en;
    public string $reference_4_en;
    public string $reference_5_en;
    public string $reference_6_en;
    
    // References Section - Chinese
    public string $references_title_zh;
    public string $reference_1_zh;
    public string $reference_2_zh;
    public string $reference_3_zh;
    public string $reference_4_zh;
    public string $reference_5_zh;
    public string $reference_6_zh;

    // Abbreviations - localized
    public ?string $abbreviations_en;
    public ?string $abbreviations_zh;

    public static function group(): string
    {
        return 'mechanism_of_action';
    }

    // Helper methods to get localized content
    public function getHeaderTitle(): string
    {
        return app()->getLocale() === 'zh' ? (string) $this->header_title_zh : (string) $this->header_title_en;
    }

    public function getHeaderImage(): string
    {
        $value = app()->getLocale() === 'zh' ? $this->header_image_zh : $this->header_image_en;
        if (empty($value)) {
            // default fallback
            $value = '/front-end/images/EfficacyProfile2.png';
        }
        return $this->toUrl($value);
    }

    public function getHeaderSecondaryImage(): string
    {
        $value = app()->getLocale() === 'zh' ? $this->header_secondary_image_zh : $this->header_secondary_image_en;
        if (empty($value)) {
            // default fallback
            $value = '/front-end/images/MechanismofAction.png';
        }
        return $this->toUrl($value);
    }

    public function getSectionTitle(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_title_" . app()->getLocale();
        return (string) ($this->$property ?? $this->{"section_{$sectionNumber}_title_en"} ?? '');
    }

    public function getSectionContent(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_content_" . app()->getLocale();
        return (string) ($this->$property ?? $this->{"section_{$sectionNumber}_content_en"} ?? '');
    }

    public function getSectionImage(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_image_" . app()->getLocale();
        $value = $this->$property ?? $this->{"section_{$sectionNumber}_image_en"} ?? null;
        if (empty($value)) {
            $value = match ($sectionNumber) {
                1 => '/front-end/images/Asset.png',
                3 => '/front-end/images/Asset2.png',
                default => '',
            };
        }
        return $this->toUrl($value);
    }

    public function getSectionCaption(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_caption_" . app()->getLocale();
        $value = $this->$property ?? $this->{"section_{$sectionNumber}_caption_en"} ?? null;
        return $value ?? '';
    }

    public function getMetaTitle(): string
    {
        return app()->getLocale() === 'zh' ? (string) $this->meta_title_zh : (string) $this->meta_title_en;
    }

    public function getMetaDescription(): string
    {
        return app()->getLocale() === 'zh' ? (string) $this->meta_description_zh : (string) $this->meta_description_en;
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
        return app()->getLocale() === 'zh' ? (string) $this->references_title_zh : (string) $this->references_title_en;
    }

    public function getReference(int $referenceNumber): string
    {
        $property = "reference_{$referenceNumber}_" . app()->getLocale();
        return (string) ($this->$property ?? $this->{"reference_{$referenceNumber}_en"} ?? '');
    }

    public function getAbbreviations(): string
    {
        $value = app()->getLocale() === 'zh' ? $this->abbreviations_zh : $this->abbreviations_en;
        return $value ?? '';
    }

    protected function toUrl(?string $path): string
    {
        if (empty($path)) {
            return '';
        }

        // If it already looks like an absolute URL
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // If it is an absolute path starting with '/': use asset()
        if (str_starts_with($path, '/')) {
            return asset($path);
        }

        // Otherwise assume it's on the public disk (Filament default with storage:link)
        return asset('storage/' . ltrim($path, '/'));
    }
}
