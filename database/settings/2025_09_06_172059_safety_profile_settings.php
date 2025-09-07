<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('safety_profile.header_title_en', 'Safety Profile');
        $this->migrator->add('safety_profile.header_subtitle_en', 'Look into the safety data');
        $this->migrator->add('safety_profile.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('safety_profile.header_secondary_image_en', '/front-end/images/EfficacyProfile.png');
        
        // Header Section - Chinese
        $this->migrator->add('safety_profile.header_title_zh', '安全性概況');
        $this->migrator->add('safety_profile.header_subtitle_zh', '查看安全性數據');
        $this->migrator->add('safety_profile.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('safety_profile.header_secondary_image_zh', '/front-end/images/EfficacyProfile.png');
        
        // Safety Points Section - English
        $this->migrator->add('safety_profile.safety_point_1_en', 'Ruxolitinib cream was well-tolerated.');
        $this->migrator->add('safety_profile.safety_point_2_en', 'Treatment-related TEAEs among patients who applied Ruxolitinib cream at any time were all mild or moderate (none serious)');
        
        // Safety Points Section - Chinese
        $this->migrator->add('safety_profile.safety_point_1_zh', '魯索利替尼乳膏具有良好的耐受性。');
        $this->migrator->add('safety_profile.safety_point_2_zh', '在任何時候使用魯索利替尼乳膏的患者中，與治療相關的TEAE都是輕度或中度（無嚴重）');
        
        // Adverse Reactions Section - English
        $this->migrator->add('safety_profile.adverse_title_en', 'Adverse Reactions Associated with Ruxolitinib at 52 Weeks⁹');
        $this->migrator->add('safety_profile.adverse_subtitle_en', 'Adverse Reactions Occurring in Patients Treated with Ruxolitinib through Week 52 In TRuE-V1 and TRuE-V2');
        $this->migrator->add('safety_profile.adverse_image_en', '/front-end/images/Adverse.png');
        $this->migrator->add('safety_profile.adverse_note_1_en', 'Occurring in ≥2% of patients in any treatment group.');
        $this->migrator->add('safety_profile.adverse_note_2_en', 'No serious TEAEs were considered by the investigators to be related to treatment.');
        
        // Adverse Reactions Section - Chinese
        $this->migrator->add('safety_profile.adverse_title_zh', '與魯索利替尼相關的不良反應（52週）⁹');
        $this->migrator->add('safety_profile.adverse_subtitle_zh', '在TRuE-V1和TRuE-V2中，通過第52週接受魯索利替尼治療的患者發生的不良反應');
        $this->migrator->add('safety_profile.adverse_image_zh', '/front-end/images/Adverse.png');
        $this->migrator->add('safety_profile.adverse_note_1_zh', '發生在任何治療組中≥2%的患者中。');
        $this->migrator->add('safety_profile.adverse_note_2_zh', '研究人員認為沒有嚴重的TEAE與治療相關。');
        
        // Meta Information - English
        $this->migrator->add('safety_profile.meta_title_en', 'Safety Profile - Lumirix');
        $this->migrator->add('safety_profile.meta_description_en', 'Explore the safety profile of Lumirix® (ruxolitinib) cream for vitiligo treatment. Learn about adverse reactions and safety data.');
        $this->migrator->add('safety_profile.meta_keywords_en', 'Lumirix, safety profile, ruxolitinib, adverse reactions, vitiligo treatment, safety data');
        
        // Meta Information - Chinese
        $this->migrator->add('safety_profile.meta_title_zh', '安全性概況 - Lumirix');
        $this->migrator->add('safety_profile.meta_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的安全性概況。了解不良反應和安全性數據。');
        $this->migrator->add('safety_profile.meta_keywords_zh', 'Lumirix, 安全性概況, 魯索利替尼, 不良反應, 白癜風治療, 安全性數據');
        
        // Open Graph - English
        $this->migrator->add('safety_profile.og_title_en', 'Safety Profile - Lumirix');
        $this->migrator->add('safety_profile.og_description_en', 'Explore the safety profile of Lumirix® (ruxolitinib) cream for vitiligo treatment.');
        
        // Open Graph - Chinese
        $this->migrator->add('safety_profile.og_title_zh', '安全性概況 - Lumirix');
        $this->migrator->add('safety_profile.og_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的安全性概況。');
        
        $this->migrator->add('safety_profile.og_image', '/front-end/images/og-safety.png');
        
        // References Section - English
        $this->migrator->add('safety_profile.references_title_en', 'Reference:');
        $this->migrator->add('safety_profile.reference_1_en', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55. Supplementary material.');
        
        // References Section - Chinese
        $this->migrator->add('safety_profile.references_title_zh', '參考文獻：');
        $this->migrator->add('safety_profile.reference_1_zh', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022年10月20日;387(16):1445-55。補充材料。');
    }
};