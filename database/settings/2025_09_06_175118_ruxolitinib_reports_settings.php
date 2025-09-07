<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('ruxolitinib_reports.header_title_en', 'Efficacy PROFILE');
        $this->migrator->add('ruxolitinib_reports.header_subtitle_en', 'Ruxolitinib Cream Case Reports');
        $this->migrator->add('ruxolitinib_reports.header_image_en', '/front-end/images/EfficacyProfile2.png');
        
        // Header Section - Chinese
        $this->migrator->add('ruxolitinib_reports.header_title_zh', '療效概況');
        $this->migrator->add('ruxolitinib_reports.header_subtitle_zh', '魯索利替尼乳膏病例報告');
        $this->migrator->add('ruxolitinib_reports.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        
        // Images Section - English
        $this->migrator->add('ruxolitinib_reports.image_1_en', '/front-end/images/Asset 16.png');
        $this->migrator->add('ruxolitinib_reports.image_2_en', '/front-end/images/Asset 17.png');
        $this->migrator->add('ruxolitinib_reports.image_3_en', '/front-end/images/Asset 19.png');
        $this->migrator->add('ruxolitinib_reports.image_4_en', '/front-end/images/Asset 18.png');
        
        // Images Section - Chinese
        $this->migrator->add('ruxolitinib_reports.image_1_zh', '/front-end/images/Asset 16.png');
        $this->migrator->add('ruxolitinib_reports.image_2_zh', '/front-end/images/Asset 17.png');
        $this->migrator->add('ruxolitinib_reports.image_3_zh', '/front-end/images/Asset 19.png');
        $this->migrator->add('ruxolitinib_reports.image_4_zh', '/front-end/images/Asset 18.png');
        
        // Meta Information - English
        $this->migrator->add('ruxolitinib_reports.meta_title_en', 'Ruxolitinib Cream Case Reports - Lumirix');
        $this->migrator->add('ruxolitinib_reports.meta_description_en', 'Explore case reports and clinical data for Lumirix® (ruxolitinib) cream in vitiligo treatment.');
        $this->migrator->add('ruxolitinib_reports.meta_keywords_en', 'Lumirix, ruxolitinib, case reports, vitiligo treatment, clinical data');
        
        // Meta Information - Chinese
        $this->migrator->add('ruxolitinib_reports.meta_title_zh', '魯索利替尼乳膏病例報告 - Lumirix');
        $this->migrator->add('ruxolitinib_reports.meta_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的病例報告和臨床數據。');
        $this->migrator->add('ruxolitinib_reports.meta_keywords_zh', 'Lumirix, 魯索利替尼, 病例報告, 白癜風治療, 臨床數據');
        
        // Open Graph - English
        $this->migrator->add('ruxolitinib_reports.og_title_en', 'Ruxolitinib Cream Case Reports - Lumirix');
        $this->migrator->add('ruxolitinib_reports.og_description_en', 'Explore case reports and clinical data for Lumirix® (ruxolitinib) cream.');
        
        // Open Graph - Chinese
        $this->migrator->add('ruxolitinib_reports.og_title_zh', '魯索利替尼乳膏病例報告 - Lumirix');
        $this->migrator->add('ruxolitinib_reports.og_description_zh', '探索Lumirix®（魯索利替尼）乳膏的病例報告和臨床數據。');
        
        $this->migrator->add('ruxolitinib_reports.og_image', '/front-end/images/og-reports.png');
        
        // References Section - English
        $this->migrator->add('ruxolitinib_reports.references_title_en', 'Reference:');
        $this->migrator->add('ruxolitinib_reports.reference_1_en', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of Ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55. Supplementary available at: https://www.nejm.org/doi/suppl/10.1056/NEJMoa2118828/suppl_file/nejmoa2118828_appendix.pdf. Last accessed: 4.12.2024.');
        
        // References Section - Chinese
        $this->migrator->add('ruxolitinib_reports.references_title_zh', '參考文獻：');
        $this->migrator->add('ruxolitinib_reports.reference_1_zh', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022年10月20日;387(16):1445-55。補充材料可在以下網址獲得：https://www.nejm.org/doi/suppl/10.1056/NEJMoa2118828/suppl_file/nejmoa2118828_appendix.pdf。最後訪問：2024年12月4日。');
    }
};