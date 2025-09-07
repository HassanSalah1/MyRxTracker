<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SettingExpectationsSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public string $header_image_en;
    public string $header_secondary_image_en;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public string $header_image_zh;
    public string $header_secondary_image_zh;
    
    // Checklist Section - English
    public string $checklist_title_en;
    public string $checklist_item_1_en;
    public string $checklist_item_2_en;
    public string $checklist_item_3_en;
    public string $checklist_item_4_en;
    
    // Checklist Section - Chinese
    public string $checklist_title_zh;
    public string $checklist_item_1_zh;
    public string $checklist_item_2_zh;
    public string $checklist_item_3_zh;
    public string $checklist_item_4_zh;
    
    // Repigmentation Section - English
    public string $repigmentation_title_en;
    public string $repigment_fast_title_en;
    public string $repigment_fast_description_en;
    public string $repigment_slow_title_en;
    public string $repigment_slow_description_en;
    public string $repigment_none_title_en;
    public string $repigment_none_description_en;
    
    // Repigmentation Section - Chinese
    public string $repigmentation_title_zh;
    public string $repigment_fast_title_zh;
    public string $repigment_fast_description_zh;
    public string $repigment_slow_title_zh;
    public string $repigment_slow_description_zh;
    public string $repigment_none_title_zh;
    public string $repigment_none_description_zh;
    
    // Patterns Section - English
    public string $patterns_title_en;
    public string $perifollicular_title_en;
    public string $perifollicular_description_en;
    public string $perifollicular_image_en;
    public string $marginal_title_en;
    public string $marginal_description_en;
    public string $marginal_image_en;
    public string $combined_title_en;
    public string $combined_description_en;
    
    // Patterns Section - Chinese
    public string $patterns_title_zh;
    public string $perifollicular_title_zh;
    public string $perifollicular_description_zh;
    public string $perifollicular_image_zh;
    public string $marginal_title_zh;
    public string $marginal_description_zh;
    public string $marginal_image_zh;
    public string $combined_title_zh;
    public string $combined_description_zh;
    
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
    
    // References Section - Chinese
    public string $references_title_zh;
    public string $reference_1_zh;
    public string $reference_2_zh;
    public string $reference_3_zh;
    public string $reference_4_zh;
    public string $reference_5_zh;

    public static function group(): string
    {
        return 'setting_expectations';
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

    public function getChecklistTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->checklist_title_zh : $this->checklist_title_en;
    }

    public function getChecklistItem(int $itemNumber): string
    {
        $property = "checklist_item_{$itemNumber}_" . app()->getLocale();
        return $this->$property ?? $this->{"checklist_item_{$itemNumber}_en"};
    }

    public function getRepigmentationTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->repigmentation_title_zh : $this->repigmentation_title_en;
    }

    public function getRepigmentFastTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->repigment_fast_title_zh : $this->repigment_fast_title_en;
    }

    public function getRepigmentFastDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->repigment_fast_description_zh : $this->repigment_fast_description_en;
    }

    public function getRepigmentSlowTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->repigment_slow_title_zh : $this->repigment_slow_title_en;
    }

    public function getRepigmentSlowDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->repigment_slow_description_zh : $this->repigment_slow_description_en;
    }

    public function getRepigmentNoneTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->repigment_none_title_zh : $this->repigment_none_title_en;
    }

    public function getRepigmentNoneDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->repigment_none_description_zh : $this->repigment_none_description_en;
    }

    public function getPatternsTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->patterns_title_zh : $this->patterns_title_en;
    }

    public function getPerifollicularTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->perifollicular_title_zh : $this->perifollicular_title_en;
    }

    public function getPerifollicularDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->perifollicular_description_zh : $this->perifollicular_description_en;
    }

    public function getPerifollicularImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->perifollicular_image_zh : $this->perifollicular_image_en;
    }

    public function getMarginalTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->marginal_title_zh : $this->marginal_title_en;
    }

    public function getMarginalDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->marginal_description_zh : $this->marginal_description_en;
    }

    public function getMarginalImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->marginal_image_zh : $this->marginal_image_en;
    }

    public function getCombinedTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->combined_title_zh : $this->combined_title_en;
    }

    public function getCombinedDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->combined_description_zh : $this->combined_description_en;
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
