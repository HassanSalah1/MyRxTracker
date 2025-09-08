<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomeSettings extends Settings
{
    // Header Section - English
    public string $header_title_en;
    public string $header_subtitle_en;
    public string $header_button_text_en;
    public string $header_button_link;
    public ?string $header_image;
    
    // Header Section - Chinese
    public string $header_title_zh;
    public string $header_subtitle_zh;
    public string $header_button_text_zh;
    
    // Why Choose Section - English
    public string $why_choose_title_en;
    //public string $why_choose_subtitle_en;
    public ?string $why_choose_image;
    
    // Why Choose Section - Chinese
    public string $why_choose_title_zh;
    //public string $why_choose_subtitle_zh;
    
    // Feature 1 - English
    public string $feature_1_title_en;
    public string $feature_1_description_en;
    public string $feature_1_link_text_en;
    public string $feature_1_link_url;
    public ?string $feature_1_image;
    
    // Feature 1 - Chinese
    public string $feature_1_title_zh;
    public string $feature_1_description_zh;
    public string $feature_1_link_text_zh;
    
    // Feature 2 - English
    public string $feature_2_title_en;
    public string $feature_2_description_en;
    public string $feature_2_link_text_en;
    public string $feature_2_link_url;
    public ?string $feature_2_image;
    
    // Feature 2 - Chinese
    public string $feature_2_title_zh;
    public string $feature_2_description_zh;
    public string $feature_2_link_text_zh;
    
    // Feature 3 - English
    public string $feature_3_title_en;
    public string $feature_3_description_en;
    public string $feature_3_link_text_en;
    public string $feature_3_link_url;
    public ?string $feature_3_image;
    
    // Feature 3 - Chinese
    public string $feature_3_title_zh;
    public string $feature_3_description_zh;
    public string $feature_3_link_text_zh;
    
    // Feature 4 - English
    public string $feature_4_title_en;
    public string $feature_4_description_en;
    public string $feature_4_link_text_en;
    public string $feature_4_link_url;
    public ?string $feature_4_image;
    
    // Feature 4 - Chinese
    public string $feature_4_title_zh;
    public string $feature_4_description_zh;
    public string $feature_4_link_text_zh;
    
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
        return 'home';
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

    public function getHeaderButtonText(): string
    {
        return app()->getLocale() === 'zh' ? $this->header_button_text_zh : $this->header_button_text_en;
    }

    public function getWhyChooseTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->why_choose_title_zh : $this->why_choose_title_en;
    }

    public function getWhyChooseSubtitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->why_choose_subtitle_zh : $this->why_choose_subtitle_en;
    }

    public function getFeatureTitle(int $featureNumber): string
    {
        $property = "feature_{$featureNumber}_title_" . app()->getLocale();
        return $this->$property ?? $this->{"feature_{$featureNumber}_title_en"};
    }

    public function getFeatureDescription(int $featureNumber): string
    {
        $property = "feature_{$featureNumber}_description_" . app()->getLocale();
        return $this->$property ?? $this->{"feature_{$featureNumber}_description_en"};
    }

    public function getFeatureLinkText(int $featureNumber): string
    {
        $property = "feature_{$featureNumber}_link_text_" . app()->getLocale();
        return $this->$property ?? $this->{"feature_{$featureNumber}_link_text_en"};
    }

    public function getFeatureLinkUrl(int $featureNumber): string
    {
        return $this->{"feature_{$featureNumber}_link_url"};
    }

    public function getFeatureImage(int $featureNumber): string
    {
        $value = $this->{"feature_{$featureNumber}_image"} ?? null;
        if (empty($value)) {
            $value = match ($featureNumber) {
                1 => '/front-end/images/choose/image (27).png',
                2 => '/front-end/images/choose/image (28).png',
                3 => '/front-end/images/choose/image (29).png',
                4 => '/front-end/images/choose/Rectangle 5.png',
                default => '',
            };
        }
        return $this->toUrl($value);
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

    public function getWhyChooseImage(): string
    {
        $value = $this->why_choose_image ?? null;
        if (empty($value)) {
            $value = '/front-end/images/home_why.png';
        }
        return $this->toUrl($value);
    }

    public function getHeaderImage(): string
    {
        $value = $this->header_image ?? null;
        if (empty($value)) {
            $value = '/front-end/images/headerImg.png';
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
