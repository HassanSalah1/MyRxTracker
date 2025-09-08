<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ExploreEfficacyTvasiSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public string $header_subtitle_en;
    public ?string $header_image_en;
    public ?string $header_secondary_image_en;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public string $header_subtitle_zh;
    public ?string $header_image_zh;
    public ?string $header_secondary_image_zh;
    
    // Tab Section - English
    public string $tab_1_title_en;
    public string $tab_2_title_en;
    public string $highlight_text_en;
    public string $efficacy_title_en;
    public ?string $study_design_image_en;
    public string $percentage_note_en;
    public ?string $proportion_image_en;
    public string $proportion_caption_en;
    public string $year_data_title_en;
    public ?string $year_data_image_en;
    public string $chart_percentage_en;
    public string $chart_description_en;
    
    // Tab Section - Chinese
    public string $tab_1_title_zh;
    public string $tab_2_title_zh;
    public string $highlight_text_zh;
    public string $efficacy_title_zh;
    public ?string $study_design_image_zh;
    public string $percentage_note_zh;
    public ?string $proportion_image_zh;
    public string $proportion_caption_zh;
    public string $year_data_title_zh;
    public ?string $year_data_image_zh;
    public string $chart_percentage_zh;
    public string $chart_description_zh;
    
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
    
    // References Section - Chinese
    public string $references_title_zh;
    public string $reference_1_zh;
    public string $reference_2_zh;
    public string $reference_3_zh;

    public static function group(): string
    {
        return 'explore_efficacy_tvasi';
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
            $value = '/front-end/images/MechanismofAction.png';
        }
        return $this->toUrl($value);
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
        $value = app()->getLocale() === 'zh' ? ($this->study_design_image_zh ?? null) : ($this->study_design_image_en ?? null);
        if (empty($value)) {
            $value = '/front-end/images/weekData.png';
        }
        return $this->toUrl($value);
    }

    public function getPercentageNote(): string
    {
        return app()->getLocale() === 'zh' ? $this->percentage_note_zh : $this->percentage_note_en;
    }

    public function getProportionImage(): string
    {
        $value = app()->getLocale() === 'zh' ? ($this->proportion_image_zh ?? null) : ($this->proportion_image_en ?? null);
        if (empty($value)) {
            $value = '/front-end/images/ProportionofPatients.png';
        }
        return $this->toUrl($value);
    }

    public function getProportionCaption(): string
    {
        return app()->getLocale() === 'zh' ? $this->proportion_caption_zh : $this->proportion_caption_en;
    }

    public function getYearDataTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->year_data_title_zh : $this->year_data_title_en;
    }

    public function getYearDataImage(): string
    {
        $value = app()->getLocale() === 'zh' ? ($this->year_data_image_zh ?? null) : ($this->year_data_image_en ?? null);
        if (empty($value)) {
            $value = '/front-end/images/yearData.png';
        }
        return $this->toUrl($value);
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
