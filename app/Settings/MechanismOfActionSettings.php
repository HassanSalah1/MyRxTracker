<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MechanismOfActionSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public string $header_image_en;
    public string $header_secondary_image_en;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public string $header_image_zh;
    public string $header_secondary_image_zh;
    
    // Section 1 - English
    public string $section_1_title_en;
    public string $section_1_content_en;
    public string $section_1_image_en;
    public string $section_1_caption_en;
    
    // Section 1 - Chinese
    public string $section_1_title_zh;
    public string $section_1_content_zh;
    public string $section_1_image_zh;
    public string $section_1_caption_zh;
    
    // Section 2 - English
    public string $section_2_title_en;
    public string $section_2_content_en;
    
    // Section 2 - Chinese
    public string $section_2_title_zh;
    public string $section_2_content_zh;
    
    // Section 3 - English
    public string $section_3_title_en;
    public string $section_3_content_en;
    public string $section_3_image_en;
    public string $section_3_caption_en;
    
    // Section 3 - Chinese
    public string $section_3_title_zh;
    public string $section_3_content_zh;
    public string $section_3_image_zh;
    public string $section_3_caption_zh;
    
    // Section 4 - English
    public string $section_4_title_en;
    public string $section_4_content_en;
    
    // Section 4 - Chinese
    public string $section_4_title_zh;
    public string $section_4_content_zh;
    
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

    public static function group(): string
    {
        return 'mechanism_of_action';
    }

    // Helper methods to get localized content
    public function getHeaderTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_title_zh : $this->header_title_en;
    }

    public function getHeaderImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_image_zh : $this->header_image_en;
    }

    public function getHeaderSecondaryImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_secondary_image_zh : $this->header_secondary_image_en;
    }

    public function getSectionTitle(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_title_" . app()->getLocale();
        return $this->$property ?? $this->{"section_{$sectionNumber}_title_en"};
    }

    public function getSectionContent(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_content_" . app()->getLocale();
        return $this->$property ?? $this->{"section_{$sectionNumber}_content_en"};
    }

    public function getSectionImage(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_image_" . app()->getLocale();
        return $this->$property ?? $this->{"section_{$sectionNumber}_image_en"};
    }

    public function getSectionCaption(int $sectionNumber): string
    {
        $property = "section_{$sectionNumber}_caption_" . app()->getLocale();
        return $this->$property ?? $this->{"section_{$sectionNumber}_caption_en"};
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
