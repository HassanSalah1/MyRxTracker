<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('setting_expectations.header_title_en', 'Setting Expectations');
        $this->migrator->add('setting_expectations.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('setting_expectations.header_secondary_image_en', '/front-end/images/Patient.png');
        
        // Header Section - Chinese
        $this->migrator->add('setting_expectations.header_title_zh', '設定期望');
        $this->migrator->add('setting_expectations.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('setting_expectations.header_secondary_image_zh', '/front-end/images/Patient.png');
        
        // Checklist Section - English
        $this->migrator->add('setting_expectations.checklist_title_en', 'The following checklist may help with setting patient expectations.');
        $this->migrator->add('setting_expectations.checklist_item_1_en', 'Repigmentation takes time.');
        $this->migrator->add('setting_expectations.checklist_item_2_en', 'Time to repigmentation varies depending on body location, and from patient to patient.');
        $this->migrator->add('setting_expectations.checklist_item_3_en', 'Twice daily application to the affected areas.');
        $this->migrator->add('setting_expectations.checklist_item_4_en', 'After successful re-pigmentation discuss maintenance strategies with patients.');
        
        // Checklist Section - Chinese
        $this->migrator->add('setting_expectations.checklist_title_zh', '以下檢查清單可能有助於設定患者期望。');
        $this->migrator->add('setting_expectations.checklist_item_1_zh', '重新色素沉著需要時間。');
        $this->migrator->add('setting_expectations.checklist_item_2_zh', '重新色素沉著的時間因身體部位而異，也因患者而異。');
        $this->migrator->add('setting_expectations.checklist_item_3_zh', '每天兩次塗抹到受影響的區域。');
        $this->migrator->add('setting_expectations.checklist_item_4_zh', '成功重新色素沉著後，與患者討論維持策略。');
        
        // Repigmentation Section - English
        $this->migrator->add('setting_expectations.repigmentation_title_en', 'Repigmentation Develops Best in the Hair-bearing Regions.');
        $this->migrator->add('setting_expectations.repigment_fast_title_en', 'REPIGMENT FAST');
        $this->migrator->add('setting_expectations.repigment_fast_description_en', 'Areas with a higher density of hair follicles respond more rapidly to treatment.');
        $this->migrator->add('setting_expectations.repigment_slow_title_en', 'REPIGMENT SLOWLY');
        $this->migrator->add('setting_expectations.repigment_slow_description_en', 'Areas with lower density respond more slowly.');
        $this->migrator->add('setting_expectations.repigment_none_title_en', 'MAY NOT REPIGMENT');
        $this->migrator->add('setting_expectations.repigment_none_description_en', 'Areas where hair follicles are absent or in low density.');
        
        // Repigmentation Section - Chinese
        $this->migrator->add('setting_expectations.repigmentation_title_zh', '重新色素沉著在有毛髮的區域發展最好。');
        $this->migrator->add('setting_expectations.repigment_fast_title_zh', '快速重新色素沉著');
        $this->migrator->add('setting_expectations.repigment_fast_description_zh', '毛囊密度較高的區域對治療反應更快。');
        $this->migrator->add('setting_expectations.repigment_slow_title_zh', '緩慢重新色素沉著');
        $this->migrator->add('setting_expectations.repigment_slow_description_zh', '密度較低的區域反應較慢。');
        $this->migrator->add('setting_expectations.repigment_none_title_zh', '可能不會重新色素沉著');
        $this->migrator->add('setting_expectations.repigment_none_description_zh', '毛囊缺失或密度低的區域。');
        
        // Patterns Section - English
        $this->migrator->add('setting_expectations.patterns_title_en', 'Repigmentation May Occur in One of Multiple Patterns, Including:');
        $this->migrator->add('setting_expectations.perifollicular_title_en', 'Perifollicular');
        $this->migrator->add('setting_expectations.perifollicular_description_en', 'The most common pattern is the perifollicular pattern, which appears as small, round, repigmented areas around the hair follicles.');
        $this->migrator->add('setting_expectations.perifollicular_image_en', '/front-end/images/Perifollicular.png');
        $this->migrator->add('setting_expectations.marginal_title_en', 'Marginal');
        $this->migrator->add('setting_expectations.marginal_description_en', 'The marginal pattern appears as a repigmented rim at the lesion borders.');
        $this->migrator->add('setting_expectations.marginal_image_en', '/front-end/images/Marginal.png');
        $this->migrator->add('setting_expectations.combined_title_en', 'Combined');
        $this->migrator->add('setting_expectations.combined_description_en', 'Involves multiple patterns, such as marginal and perifollicular.');
        
        // Patterns Section - Chinese
        $this->migrator->add('setting_expectations.patterns_title_zh', '重新色素沉著可能以多種模式之一出現，包括：');
        $this->migrator->add('setting_expectations.perifollicular_title_zh', '毛囊周圍');
        $this->migrator->add('setting_expectations.perifollicular_description_zh', '最常見的模式是毛囊周圍模式，表現為毛囊周圍的小圓形重新色素沉著區域。');
        $this->migrator->add('setting_expectations.perifollicular_image_zh', '/front-end/images/Perifollicular.png');
        $this->migrator->add('setting_expectations.marginal_title_zh', '邊緣');
        $this->migrator->add('setting_expectations.marginal_description_zh', '邊緣模式表現為病變邊界的重新色素沉著邊緣。');
        $this->migrator->add('setting_expectations.marginal_image_zh', '/front-end/images/Marginal.png');
        $this->migrator->add('setting_expectations.combined_title_zh', '組合');
        $this->migrator->add('setting_expectations.combined_description_zh', '涉及多種模式，如邊緣和毛囊周圍。');
        
        // Meta Information - English
        $this->migrator->add('setting_expectations.meta_title_en', 'Setting Expectations - Lumirix');
        $this->migrator->add('setting_expectations.meta_description_en', 'Learn about setting realistic expectations for Lumirix® (ruxolitinib) cream treatment in vitiligo patients.');
        $this->migrator->add('setting_expectations.meta_keywords_en', 'Lumirix, expectations, vitiligo treatment, repigmentation, patient care');
        
        // Meta Information - Chinese
        $this->migrator->add('setting_expectations.meta_title_zh', '設定期望 - Lumirix');
        $this->migrator->add('setting_expectations.meta_description_zh', '了解為Lumirix®（魯索利替尼）乳膏治療白癜風患者設定現實期望。');
        $this->migrator->add('setting_expectations.meta_keywords_zh', 'Lumirix, 期望, 白癜風治療, 重新色素沉著, 患者護理');
        
        // Open Graph - English
        $this->migrator->add('setting_expectations.og_title_en', 'Setting Expectations - Lumirix');
        $this->migrator->add('setting_expectations.og_description_en', 'Learn about setting realistic expectations for Lumirix® treatment.');
        
        // Open Graph - Chinese
        $this->migrator->add('setting_expectations.og_title_zh', '設定期望 - Lumirix');
        $this->migrator->add('setting_expectations.og_description_zh', '了解為Lumirix®治療設定現實期望。');
        
        $this->migrator->add('setting_expectations.og_image', '/front-end/images/og-expectations.png');
        
        // References Section - English
        $this->migrator->add('setting_expectations.references_title_en', 'References:');
        $this->migrator->add('setting_expectations.reference_1_en', '3. Lumirix® Prescribing Information for Hong Kong.');
        $this->migrator->add('setting_expectations.reference_2_en', '8. Birlea SA, Goldstein NB, Norris DA. Repigmentation through melanocyte regeneration in vitiligo. Dermatologic clinics. 2017 Apr 1;35(2):205-18.');
        $this->migrator->add('setting_expectations.reference_3_en', '10. Rosmarin D, Sebastian M, Amster M, et al. Facial and total vitiligo area scoring index response shift during 104 weeks of Ruxolitinib cream treatment for vitiligo: results from the open-label arm of the TRuE-V long-term extension phase 3 study. Presented at the American Academy of Dermatology Annual Meeting; March 17–21, 2023; New Orleans, LA.');
        $this->migrator->add('setting_expectations.reference_4_en', '12. Harris JE, Papp K, Forman SB, et al. Relapse and maintenance of clinical response in the randomized withdrawal arm of the TRuE-V long-term extension phase 3 study of ruxolitinib cream in vitiligo. Presented at the American Academy of Dermatology Annual Meeting; March 17–21, 2023; New Orleans, LA.');
        $this->migrator->add('setting_expectations.reference_5_en', '13. Yang K, Xiong X, Pallavi G, Ling Y, Ding F, Duan W, Sun W, Ding G, Gong Q, Zhu W, Lu Y. The early repigmentation pattern of vitiligo is related to the source of melanocytes and by the choice of therapy: a retrospective cohort study. International Journal of Dermatology. 2018 Mar;57(3):324-31.');
        
        // References Section - Chinese
        $this->migrator->add('setting_expectations.references_title_zh', '參考文獻：');
        $this->migrator->add('setting_expectations.reference_1_zh', '3. Lumirix® 香港處方資訊。');
        $this->migrator->add('setting_expectations.reference_2_zh', '8. Birlea SA, Goldstein NB, Norris DA. 白癜風中通過黑素細胞再生進行重新色素沉著。皮膚科診所。2017年4月1日;35(2):205-18。');
        $this->migrator->add('setting_expectations.reference_3_zh', '10. Rosmarin D, Sebastian M, Amster M等。魯索利替尼乳膏治療白癜風104週期間面部和總白癜風面積評分指數反應轉移：來自TRuE-V長期延長3期研究開放標籤組的結果。在美國皮膚病學會年會上發表；2023年3月17-21日；新奧爾良，洛杉磯。');
        $this->migrator->add('setting_expectations.reference_4_zh', '12. Harris JE, Papp K, Forman SB等。魯索利替尼乳膏治療白癜風的TRuE-V長期延長3期研究隨機退出組中復發和臨床反應維持。在美國皮膚病學會年會上發表；2023年3月17-21日；新奧爾良，洛杉磯。');
        $this->migrator->add('setting_expectations.reference_5_zh', '13. Yang K, Xiong X, Pallavi G, Ling Y, Ding F, Duan W, Sun W, Ding G, Gong Q, Zhu W, Lu Y. 白癜風的早期重新色素沉著模式與黑素細胞來源和治療選擇相關：一項回顧性隊列研究。國際皮膚病學雜誌。2018年3月;57(3):324-31。');
    }
};