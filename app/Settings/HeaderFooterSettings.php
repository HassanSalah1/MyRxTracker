<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HeaderFooterSettings extends Settings
{
    public static function group(): string
    {
        return 'header_footer';
    }

    // Navigation Menu Items - English
    public string $nav_home_en;
    public string $nav_mechanism_of_action_en;
    public string $nav_efficacy_profile_en;
    public string $nav_efficacy_profile_sub_en;
    public string $nav_efficacy_f_vasi_en;
    public string $nav_efficacy_t_vasi_en;
    public string $nav_ruxolitinib_reports_en;
    public string $nav_safety_profile_en;
    public string $nav_dosing_en;
    public string $nav_setting_expectations_en;
    public string $nav_download_en;
    public string $nav_patient_support_en;

    // Navigation Menu Items - Chinese
    public string $nav_home_zh;
    public string $nav_mechanism_of_action_zh;
    public string $nav_efficacy_profile_zh;
    public string $nav_efficacy_profile_sub_zh;
    public string $nav_efficacy_f_vasi_zh;
    public string $nav_efficacy_t_vasi_zh;
    public string $nav_ruxolitinib_reports_zh;
    public string $nav_safety_profile_zh;
    public string $nav_dosing_zh;
    public string $nav_setting_expectations_zh;
    public string $nav_download_zh;
    public string $nav_patient_support_zh;

    // Footer Content - English
    public string $footer_title_en;
    public string $footer_description_en;
    public string $footer_contact_prompt_en;
    public string $footer_form_name_placeholder_en;
    public string $footer_form_email_placeholder_en;
    public string $footer_form_phone_placeholder_en;
    public string $footer_form_message_placeholder_en;
    public string $footer_form_submit_button_en;
    public string $footer_terms_of_use_en;
    public string $footer_privacy_policy_en;
    public string $footer_company_name_en;
    public string $footer_address_en;
    public string $footer_phone_en;
    public string $footer_disclaimer_en;
    public string $footer_qr_text_en;
    public string $footer_copyright_en;

    // Footer Content - Chinese
    public string $footer_title_zh;
    public string $footer_description_zh;
    public string $footer_contact_prompt_zh;
    public string $footer_form_name_placeholder_zh;
    public string $footer_form_email_placeholder_zh;
    public string $footer_form_phone_placeholder_zh;
    public string $footer_form_message_placeholder_zh;
    public string $footer_form_submit_button_zh;
    public string $footer_terms_of_use_zh;
    public string $footer_privacy_policy_zh;
    public string $footer_company_name_zh;
    public string $footer_address_zh;
    public string $footer_phone_zh;
    public string $footer_disclaimer_zh;
    public string $footer_qr_text_zh;
    public string $footer_copyright_zh;

    // Helper methods for navigation
    public function getNavHome(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_home_zh : $this->nav_home_en;
    }

    public function getNavMechanismOfAction(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_mechanism_of_action_zh : $this->nav_mechanism_of_action_en;
    }

    public function getNavEfficacyProfile(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_efficacy_profile_zh : $this->nav_efficacy_profile_en;
    }

    public function getNavEfficacyProfileSub(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_efficacy_profile_sub_zh : $this->nav_efficacy_profile_sub_en;
    }

    public function getNavEfficacyFVasi(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_efficacy_f_vasi_zh : $this->nav_efficacy_f_vasi_en;
    }

    public function getNavEfficacyTVasi(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_efficacy_t_vasi_zh : $this->nav_efficacy_t_vasi_en;
    }

    public function getNavRuxolitinibReports(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_ruxolitinib_reports_zh : $this->nav_ruxolitinib_reports_en;
    }

    public function getNavSafetyProfile(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_safety_profile_zh : $this->nav_safety_profile_en;
    }

    public function getNavDosing(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_dosing_zh : $this->nav_dosing_en;
    }

    public function getNavSettingExpectations(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_setting_expectations_zh : $this->nav_setting_expectations_en;
    }

    public function getNavDownload(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_download_zh : $this->nav_download_en;
    }

    public function getNavPatientSupport(): string
    {
        return app()->getLocale() === 'zh' ? $this->nav_patient_support_zh : $this->nav_patient_support_en;
    }

    // Helper methods for footer
    public function getFooterTitle(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_title_zh : $this->footer_title_en;
    }

    public function getFooterDescription(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_description_zh : $this->footer_description_en;
    }

    public function getFooterContactPrompt(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_contact_prompt_zh : $this->footer_contact_prompt_en;
    }

    public function getFooterFormNamePlaceholder(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_form_name_placeholder_zh : $this->footer_form_name_placeholder_en;
    }

    public function getFooterFormEmailPlaceholder(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_form_email_placeholder_zh : $this->footer_form_email_placeholder_en;
    }

    public function getFooterFormPhonePlaceholder(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_form_phone_placeholder_zh : $this->footer_form_phone_placeholder_en;
    }

    public function getFooterFormMessagePlaceholder(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_form_message_placeholder_zh : $this->footer_form_message_placeholder_en;
    }

    public function getFooterFormSubmitButton(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_form_submit_button_zh : $this->footer_form_submit_button_en;
    }

    public function getFooterTermsOfUse(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_terms_of_use_zh : $this->footer_terms_of_use_en;
    }

    public function getFooterPrivacyPolicy(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_privacy_policy_zh : $this->footer_privacy_policy_en;
    }

    public function getFooterCompanyName(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_company_name_zh : $this->footer_company_name_en;
    }

    public function getFooterAddress(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_address_zh : $this->footer_address_en;
    }

    public function getFooterPhone(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_phone_zh : $this->footer_phone_en;
    }

    public function getFooterDisclaimer(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_disclaimer_zh : $this->footer_disclaimer_en;
    }

    public function getFooterQrText(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_qr_text_zh : $this->footer_qr_text_en;
    }

    public function getFooterCopyright(): string
    {
        return app()->getLocale() === 'zh' ? $this->footer_copyright_zh : $this->footer_copyright_en;
    }
}
