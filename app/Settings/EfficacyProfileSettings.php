<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EfficacyProfileSettings extends Settings
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
    
    // Study Description Section - English
    public string $study_description_en;
    public string $study_design_title_en;
    public string $study_design_image_en;
    public string $study_note_1_en;
    public string $study_note_2_en;
    
    // Study Description Section - Chinese
    public string $study_description_zh;
    public string $study_design_title_zh;
    public string $study_design_image_zh;
    public string $study_note_1_zh;
    public string $study_note_2_zh;
    
    // Endpoints Section - English
    public string $primary_endpoint_title_en;
    public string $primary_endpoint_content_en;
    public string $key_secondary_endpoints_title_en;
    public string $key_secondary_endpoints_content_en;
    public string $other_secondary_endpoints_title_en;
    public string $other_secondary_endpoints_content_en;
    public string $face_definition_en;
    
    // Endpoints Section - Chinese
    public string $primary_endpoint_title_zh;
    public string $primary_endpoint_content_zh;
    public string $key_secondary_endpoints_title_zh;
    public string $key_secondary_endpoints_content_zh;
    public string $other_secondary_endpoints_title_zh;
    public string $other_secondary_endpoints_content_zh;
    public string $face_definition_zh;
    
    // Demographics Section - English
    public string $demographics_title_en;
    public string $demographics_subtitle_en;
    public string $demographics_image_en;
    
    // Demographics Section - Chinese
    public string $demographics_title_zh;
    public string $demographics_subtitle_zh;
    public string $demographics_image_zh;
    
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
    
    // References Section - Chinese
    public string $references_title_zh;
    public string $reference_1_zh;
    public string $reference_2_zh;

    public static function group(): string
    {
        return 'efficacy_profile';
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

    public function getStudyDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->study_description_zh : $this->study_description_en;
    }

    public function getStudyDesignTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->study_design_title_zh : $this->study_design_title_en;
    }

    public function getStudyDesignImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->study_design_image_zh : $this->study_design_image_en;
    }

    public function getStudyNote(int $noteNumber): string
    {
        $property = "study_note_{$noteNumber}_" . app()->getLocale();
        return $this->$property ?? $this->{"study_note_{$noteNumber}_en"};
    }

    public function getPrimaryEndpointTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->primary_endpoint_title_zh : $this->primary_endpoint_title_en;
    }

    public function getPrimaryEndpointContent(): string
    {
        return app()->getLocale() === 'zh' ? $this->primary_endpoint_content_zh : $this->primary_endpoint_content_en;
    }

    public function getKeySecondaryEndpointsTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->key_secondary_endpoints_title_zh : $this->key_secondary_endpoints_title_en;
    }

    public function getKeySecondaryEndpointsContent(): string
    {
        return app()->getLocale() === 'zh' ? $this->key_secondary_endpoints_content_zh : $this->key_secondary_endpoints_content_en;
    }

    public function getOtherSecondaryEndpointsTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->other_secondary_endpoints_title_zh : $this->other_secondary_endpoints_title_en;
    }

    public function getOtherSecondaryEndpointsContent(): string
    {
        return app()->getLocale() === 'zh' ? $this->other_secondary_endpoints_content_zh : $this->other_secondary_endpoints_content_en;
    }

    public function getFaceDefinition(): string
    {
        return app()->getLocale() === 'zh' ? $this->face_definition_zh : $this->face_definition_en;
    }

    public function getDemographicsTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->demographics_title_zh : $this->demographics_title_en;
    }

    public function getDemographicsSubtitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->demographics_subtitle_zh : $this->demographics_subtitle_en;
    }

    public function getDemographicsImage(): string
    {
        return app()->getLocale() === 'zh' ? $this->demographics_image_zh : $this->demographics_image_en;
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
