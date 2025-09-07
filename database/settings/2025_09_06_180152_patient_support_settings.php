<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('patient_support.header_title_en', 'Patient Support');
        $this->migrator->add('patient_support.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('patient_support.header_secondary_image_en', '/front-end/images/Patient.png');
        
        // Header Section - Chinese
        $this->migrator->add('patient_support.header_title_zh', '患者支援');
        $this->migrator->add('patient_support.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('patient_support.header_secondary_image_zh', '/front-end/images/Patient.png');
        
        // Support Content - English
        $this->migrator->add('patient_support.support_text_en', 'Contact 告白會 | Hong Kong Vitiligo Support Group to find out more about their programs to support your patient.

Room 1917, 19/F, One Midtown, 11 Hoi Shing Road, Tsuen Wan, N.T.

HK VSG Hotline: +852 2114 1627

HK VSG\'s WhatsApp: +852 9053 1260');
        
        // Support Content - Chinese
        $this->migrator->add('patient_support.support_text_zh', '聯繫告白會 | 香港白癜風支援小組，了解更多關於他們支援您患者的計劃。

香港新界荃灣海盛路11號萬景匯19樓1917室

香港白癜風支援小組熱線：+852 2114 1627

香港白癜風支援小組WhatsApp：+852 9053 1260');
        
        // Meta Information - English
        $this->migrator->add('patient_support.meta_title_en', 'Patient Support - Lumirix');
        $this->migrator->add('patient_support.meta_description_en', 'Find patient support resources and contact information for Lumirix® (ruxolitinib) cream treatment.');
        $this->migrator->add('patient_support.meta_keywords_en', 'Lumirix, patient support, vitiligo support, contact information');
        
        // Meta Information - Chinese
        $this->migrator->add('patient_support.meta_title_zh', '患者支援 - Lumirix');
        $this->migrator->add('patient_support.meta_description_zh', '尋找Lumirix®（魯索利替尼）乳膏治療的患者支援資源和聯絡資訊。');
        $this->migrator->add('patient_support.meta_keywords_zh', 'Lumirix, 患者支援, 白癜風支援, 聯絡資訊');
        
        // Open Graph - English
        $this->migrator->add('patient_support.og_title_en', 'Patient Support - Lumirix');
        $this->migrator->add('patient_support.og_description_en', 'Find patient support resources for Lumirix® treatment.');
        
        // Open Graph - Chinese
        $this->migrator->add('patient_support.og_title_zh', '患者支援 - Lumirix');
        $this->migrator->add('patient_support.og_description_zh', '尋找Lumirix®治療的患者支援資源。');
        
        $this->migrator->add('patient_support.og_image', '/front-end/images/og-patient-support.png');
    }
};