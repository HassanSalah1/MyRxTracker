<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('download.header_title_en', 'Download Resources');
        $this->migrator->add('download.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('download.header_secondary_image_en', '/front-end/images/Patient.png');
        
        // Header Section - Chinese
        $this->migrator->add('download.header_title_zh', '下載資源');
        $this->migrator->add('download.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('download.header_secondary_image_zh', '/front-end/images/Patient.png');
        
        // Tab Content - English
        $this->migrator->add('download.tab_1_title_en', 'Lumirix® Cream Prescribing Information');
        $this->migrator->add('download.tab_2_title_en', 'Lumirix Prescribed Patient Brochure');
        $this->migrator->add('download.download_text_en', 'Please download the pdf from the link below:');
        $this->migrator->add('download.download_link_1_en', 'Here');
        $this->migrator->add('download.download_link_2_en', 'Here');
        
        // Tab Content - Chinese
        $this->migrator->add('download.tab_1_title_zh', 'Lumirix®乳膏處方資訊');
        $this->migrator->add('download.tab_2_title_zh', 'Lumirix處方患者手冊');
        $this->migrator->add('download.download_text_zh', '請從下面的連結下載PDF：');
        $this->migrator->add('download.download_link_1_zh', '這裡');
        $this->migrator->add('download.download_link_2_zh', '這裡');
        
        // Meta Information - English
        $this->migrator->add('download.meta_title_en', 'Download Resources - Lumirix');
        $this->migrator->add('download.meta_description_en', 'Download prescribing information and patient brochures for Lumirix® (ruxolitinib) cream.');
        $this->migrator->add('download.meta_keywords_en', 'Lumirix, download, resources, prescribing information, patient brochure');
        
        // Meta Information - Chinese
        $this->migrator->add('download.meta_title_zh', '下載資源 - Lumirix');
        $this->migrator->add('download.meta_description_zh', '下載Lumirix®（魯索利替尼）乳膏的處方資訊和患者手冊。');
        $this->migrator->add('download.meta_keywords_zh', 'Lumirix, 下載, 資源, 處方資訊, 患者手冊');
        
        // Open Graph - English
        $this->migrator->add('download.og_title_en', 'Download Resources - Lumirix');
        $this->migrator->add('download.og_description_en', 'Download prescribing information and patient brochures for Lumirix® cream.');
        
        // Open Graph - Chinese
        $this->migrator->add('download.og_title_zh', '下載資源 - Lumirix');
        $this->migrator->add('download.og_description_zh', '下載Lumirix®乳膏的處方資訊和患者手冊。');
        
        $this->migrator->add('download.og_image', '/front-end/images/og-download.png');
    }
};