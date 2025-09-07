<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('home.header_title_en', 'Reimagine Vitiligo Treatment with Lumirix®');
        $this->migrator->add('home.header_subtitle_en', 'Lumirix® is the first topical treatment approved for vitiligo.');
        $this->migrator->add('home.header_button_text_en', 'Learn more');
        
        // Header Section - Chinese
        $this->migrator->add('home.header_title_zh', '重新想像白癜風治療與 Lumirix®');
        $this->migrator->add('home.header_subtitle_zh', 'Lumirix® 是首個獲批用於白癜風的外用治療藥物。');
        $this->migrator->add('home.header_button_text_zh', '了解更多');
        
        $this->migrator->add('home.header_button_link', '/mechanism-of-action');
        $this->migrator->add('home.header_image', '/front-end/images/headerImg.png');
        
        // Why Choose Section - English
        $this->migrator->add('home.why_choose_title_en', 'Why Choose Lumirix® for Your Vitiligo Treatment?');
        $this->migrator->add('home.why_choose_subtitle_en', '');
        
        // Why Choose Section - Chinese
        $this->migrator->add('home.why_choose_title_zh', '為什麼選擇 Lumirix® 治療白癜風？');
        $this->migrator->add('home.why_choose_subtitle_zh', '');
        
        // Feature 1 - English
        $this->migrator->add('home.feature_1_title_en', 'Clinically Proven Results');
        $this->migrator->add('home.feature_1_description_en', 'Lumirix® is supported by clinical studies that show significant improvements in skin repigmentation.²');
        $this->migrator->add('home.feature_1_link_text_en', 'Find out more >>');
        
        // Feature 1 - Chinese
        $this->migrator->add('home.feature_1_title_zh', '臨床驗證的療效');
        $this->migrator->add('home.feature_1_description_zh', 'Lumirix® 獲得臨床研究支持，顯示皮膚色素沉著有顯著改善。²');
        $this->migrator->add('home.feature_1_link_text_zh', '了解更多 >>');
        
        $this->migrator->add('home.feature_1_link_url', '/ruxolitinib-reports');
        $this->migrator->add('home.feature_1_image', '/front-end/images/choose/image (27).png');
        
        // Feature 2 - English
        $this->migrator->add('home.feature_2_title_en', 'Targeted Treatment Approach');
        $this->migrator->add('home.feature_2_description_en', 'Lumirix® works by targeting the underlying mechanisms of vitiligo, providing a focused treatment approach.');
        $this->migrator->add('home.feature_2_link_text_en', 'Learn more >>');
        
        // Feature 2 - Chinese
        $this->migrator->add('home.feature_2_title_zh', '針對性治療方法');
        $this->migrator->add('home.feature_2_description_zh', 'Lumirix® 通過針對白癜風的潛在機制發揮作用，提供針對性的治療方法。');
        $this->migrator->add('home.feature_2_link_text_zh', '了解更多 >>');
        
        $this->migrator->add('home.feature_2_link_url', '/mechanism-of-action');
        $this->migrator->add('home.feature_2_image', '/front-end/images/choose/image (28).png');
        
        // Feature 3 - English
        $this->migrator->add('home.feature_3_title_en', 'Proven Safety Profile');
        $this->migrator->add('home.feature_3_description_en', 'Lumirix® has demonstrated a favorable safety profile in clinical trials with manageable side effects.');
        $this->migrator->add('home.feature_3_link_text_en', 'View safety >>');
        
        // Feature 3 - Chinese
        $this->migrator->add('home.feature_3_title_zh', '證實的安全性');
        $this->migrator->add('home.feature_3_description_zh', 'Lumirix® 在臨床試驗中表現出良好的安全性，副作用可控。');
        $this->migrator->add('home.feature_3_link_text_zh', '查看安全性 >>');
        
        $this->migrator->add('home.feature_3_link_url', '/safety-profile');
        $this->migrator->add('home.feature_3_image', '/front-end/images/choose/image (29).png');
        
        // Feature 4 - English
        $this->migrator->add('home.feature_4_title_en', 'Comprehensive Support');
        $this->migrator->add('home.feature_4_description_en', 'Get comprehensive patient support and resources to help you throughout your treatment journey.');
        $this->migrator->add('home.feature_4_link_text_en', 'Get support >>');
        
        // Feature 4 - Chinese
        $this->migrator->add('home.feature_4_title_zh', '全面支援');
        $this->migrator->add('home.feature_4_description_zh', '獲得全面的患者支援和資源，幫助您完成整個治療過程。');
        $this->migrator->add('home.feature_4_link_text_zh', '獲得支援 >>');
        
        $this->migrator->add('home.feature_4_link_url', '/patient-support');
        $this->migrator->add('home.feature_4_image', '/front-end/images/choose/Rectangle 5.png');
        
        // Meta Information - English
        $this->migrator->add('home.meta_title_en', 'Lumirix - Vitiligo Treatment');
        $this->migrator->add('home.meta_description_en', 'Lumirix® is the first topical treatment approved for vitiligo. Learn about clinically proven results and comprehensive patient support.');
        $this->migrator->add('home.meta_keywords_en', 'Lumirix, vitiligo treatment, topical treatment, skin repigmentation, healthcare professional');
        
        // Meta Information - Chinese
        $this->migrator->add('home.meta_title_zh', 'Lumirix - 白癜風治療');
        $this->migrator->add('home.meta_description_zh', 'Lumirix® 是首個獲批用於白癜風的外用治療藥物。了解臨床驗證的療效和全面的患者支援。');
        $this->migrator->add('home.meta_keywords_zh', 'Lumirix, 白癜風治療, 外用治療, 皮膚色素沉著, 醫療專業人員');
        
        // Open Graph - English
        $this->migrator->add('home.og_title_en', 'Lumirix - Vitiligo Treatment');
        $this->migrator->add('home.og_description_en', 'Lumirix® is the first topical treatment approved for vitiligo.');
        
        // Open Graph - Chinese
        $this->migrator->add('home.og_title_zh', 'Lumirix - 白癜風治療');
        $this->migrator->add('home.og_description_zh', 'Lumirix® 是首個獲批用於白癜風的外用治療藥物。');
        
        $this->migrator->add('home.og_image', '/front-end/images/og-image.png');
        
        // References Section - English
        $this->migrator->add('home.references_title_en', 'References:');
        $this->migrator->add('home.reference_1_en', 'Grossmann MC, Haidari W, Feldman SR. A Review on the Use of Topical Ruxolitinib for the Treatment of Vitiligo. Journal of drugs in dermatology: JDD. 2023;22');
        $this->migrator->add('home.reference_2_en', 'Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of Ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55.');
        $this->migrator->add('home.reference_3_en', 'Lumirix Prescribing information for Hong Kong.');
        
        // References Section - Chinese
        $this->migrator->add('home.references_title_zh', '參考文獻：');
        $this->migrator->add('home.reference_1_zh', 'Grossmann MC, Haidari W, Feldman SR. 外用魯索利替尼治療白癜風的綜述。皮膚科藥物雜誌：JDD。2023;22');
        $this->migrator->add('home.reference_2_zh', 'Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022年10月20日;387(16):1445-55。');
        $this->migrator->add('home.reference_3_zh', 'Lumirix 香港處方資訊。');
    }
};
