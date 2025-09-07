<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ExploreEfficacyFvasiSettings extends Settings
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
    
    // Tab Section - English
    public string $tab_1_title_en;
    public string $tab_2_title_en;
    public string $highlight_text_en;
    public string $efficacy_title_en;
    public string $study_design_image_en;
    public string $percentage_note_en;
    public string $year_data_title_en;
    public string $year_data_image_en;
    public string $f_vasi_definition_en;
    public string $chart_percentage_en;
    public string $chart_description_en;
    
    // Tab Section - Chinese
    public string $tab_1_title_zh;
    public string $tab_2_title_zh;
    public string $highlight_text_zh;
    public string $efficacy_title_zh;
    public string $study_design_image_zh;
    public string $percentage_note_zh;
    public string $year_data_title_zh;
    public string $year_data_image_zh;
    public string $f_vasi_definition_zh;
    public string $chart_percentage_zh;
    public string $chart_description_zh;
    
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
        return 'explore_efficacy_fvasi';
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

    public function getTabTitle(int $tabNumber): string
    {
        $property = "tab_{$tabNumber}_title_" . app()->getLocale();
        return $this->$property ?? $this->{"tab_{$tabNumber}_title_en"};
    }

    public function getHighlightText(): string
    {
        return app()->getLocale() === 'zh' ? $this->highlight_text_zh : $this->highlight_text_en;
    }

    public function getEfficacyTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->efficacy_title_zh : $this->efficacy_title_en;
    }

    public function getStudyDesignImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->study_design_image_zh : $this->study_design_image_en;
    }

    public function getPercentageNote(): string
    {
        return app()->getLocale() === 'zh' ? $this->percentage_note_zh : $this->percentage_note_en;
    }

    public function getYearDataTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->year_data_title_zh : $this->year_data_title_en;
    }

    public function getYearDataImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->year_data_image_zh : $this->year_data_image_en;
    }

    public function getFVasiDefinition(): string
    {
        return app()->getLocale() === 'zh' ? $this->f_vasi_definition_zh : $this->f_vasi_definition_en;
    }

    public function getChartPercentage(): string
    {
        return app()->getLocale() === 'zh' ? $this->chart_percentage_zh : $this->chart_percentage_en;
    }

    public function getChartDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->chart_description_zh : $this->chart_description_en;
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
