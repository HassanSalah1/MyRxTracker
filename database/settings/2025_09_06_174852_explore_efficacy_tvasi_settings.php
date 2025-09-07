<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('explore_efficacy_tvasi.header_title_en', 'Efficacy PROFILE');
        $this->migrator->add('explore_efficacy_tvasi.header_subtitle_en', 'Explore Lumirix Efficacy');
        $this->migrator->add('explore_efficacy_tvasi.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('explore_efficacy_tvasi.header_secondary_image_en', '/front-end/images/MechanismofAction.png');
        
        // Header Section - Chinese
        $this->migrator->add('explore_efficacy_tvasi.header_title_zh', '療效概況');
        $this->migrator->add('explore_efficacy_tvasi.header_subtitle_zh', '探索Lumirix療效');
        $this->migrator->add('explore_efficacy_tvasi.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('explore_efficacy_tvasi.header_secondary_image_zh', '/front-end/images/MechanismofAction.png');
        
        // Tab Content Section - English
        $this->migrator->add('explore_efficacy_tvasi.tab_1_title_en', '24- & 52-week data');
        $this->migrator->add('explore_efficacy_tvasi.tab_2_title_en', '2-year data');
        $this->migrator->add('explore_efficacy_tvasi.highlight_text_en', 'Half the patients who applied Ruxolitinib reached F-VASI75 at week 52.');
        $this->migrator->add('explore_efficacy_tvasi.efficacy_title_en', 'Efficacy of Ruxolitinib Application on the Primary Endpoint F-VASI75 Response.');
        $this->migrator->add('explore_efficacy_tvasi.study_design_image_en', '/front-end/images/weekData.png');
        $this->migrator->add('explore_efficacy_tvasi.percentage_note_en', 'ᵃ Percentage calculated from pooled figures of the identical TRuE-V1 and TRuE-V2 study, rounded off to the nearest whole number.');
        $this->migrator->add('explore_efficacy_tvasi.proportion_image_en', '/front-end/images/ProportionofPatients.png');
        $this->migrator->add('explore_efficacy_tvasi.proportion_caption_en', 'Adapted from ref. 11');
        $this->migrator->add('explore_efficacy_tvasi.year_data_title_en', 'Efficacy of Ruxolitinib Treatment in Achieving an F-VASI75 Response at Week 52 to 104 ¹⁰');
        $this->migrator->add('explore_efficacy_tvasi.year_data_image_en', '/front-end/images/yearData.png');
        $this->migrator->add('explore_efficacy_tvasi.chart_percentage_en', '63.8%');
        $this->migrator->add('explore_efficacy_tvasi.chart_description_en', 'of patients who applied Ruxolitinib cream since day 1 achieved F-VASI75 at week 104 (LTE end-of-treatment).');
        
        // Tab Content Section - Chinese
        $this->migrator->add('explore_efficacy_tvasi.tab_1_title_zh', '24週和52週數據');
        $this->migrator->add('explore_efficacy_tvasi.tab_2_title_zh', '2年數據');
        $this->migrator->add('explore_efficacy_tvasi.highlight_text_zh', '使用魯索利替尼的患者中有一半在第52週達到F-VASI75。');
        $this->migrator->add('explore_efficacy_tvasi.efficacy_title_zh', '魯索利替尼應用在主要終點F-VASI75反應上的療效。');
        $this->migrator->add('explore_efficacy_tvasi.study_design_image_zh', '/front-end/images/weekData.png');
        $this->migrator->add('explore_efficacy_tvasi.percentage_note_zh', 'ᵃ 百分比是從相同的TRuE-V1和TRuE-V2研究的匯總數據計算得出，四捨五入到最接近的整數。');
        $this->migrator->add('explore_efficacy_tvasi.proportion_image_zh', '/front-end/images/ProportionofPatients.png');
        $this->migrator->add('explore_efficacy_tvasi.proportion_caption_zh', '改編自參考文獻11');
        $this->migrator->add('explore_efficacy_tvasi.year_data_title_zh', '魯索利替尼治療在第52週至104週達到F-VASI75反應的療效¹⁰');
        $this->migrator->add('explore_efficacy_tvasi.year_data_image_zh', '/front-end/images/yearData.png');
        $this->migrator->add('explore_efficacy_tvasi.chart_percentage_zh', '63.8%');
        $this->migrator->add('explore_efficacy_tvasi.chart_description_zh', '從第1天開始使用魯索利替尼乳膏的患者在第104週達到F-VASI75（LTE治療結束）。');
        
        // Meta Information - English
        $this->migrator->add('explore_efficacy_tvasi.meta_title_en', 'Explore Lumirix Efficacy T-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_tvasi.meta_description_en', 'Explore the efficacy of Lumirix® (ruxolitinib) cream for vitiligo treatment with T-VASI data and clinical results.');
        $this->migrator->add('explore_efficacy_tvasi.meta_keywords_en', 'Lumirix, efficacy, ruxolitinib, vitiligo treatment, T-VASI, clinical results');
        
        // Meta Information - Chinese
        $this->migrator->add('explore_efficacy_tvasi.meta_title_zh', '探索Lumirix療效T-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_tvasi.meta_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的療效，包括T-VASI數據和臨床結果。');
        $this->migrator->add('explore_efficacy_tvasi.meta_keywords_zh', 'Lumirix, 療效, 魯索利替尼, 白癜風治療, T-VASI, 臨床結果');
        
        // Open Graph - English
        $this->migrator->add('explore_efficacy_tvasi.og_title_en', 'Explore Lumirix Efficacy T-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_tvasi.og_description_en', 'Explore the efficacy of Lumirix® (ruxolitinib) cream for vitiligo treatment.');
        
        // Open Graph - Chinese
        $this->migrator->add('explore_efficacy_tvasi.og_title_zh', '探索Lumirix療效T-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_tvasi.og_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的療效。');
        
        $this->migrator->add('explore_efficacy_tvasi.og_image', '/front-end/images/og-explore-tvasi.png');
        
        // References Section - English
        $this->migrator->add('explore_efficacy_tvasi.references_title_en', 'Reference:');
        $this->migrator->add('explore_efficacy_tvasi.reference_1_en', '2. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of Ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022;387(16):1445-55');
        $this->migrator->add('explore_efficacy_tvasi.reference_2_en', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55. Supplementary available at: https://www.nejm.org/doi/suppl/10.1056/NEJMoa2118828/suppl_file/nejmoa2118828_appendix.pdf. Last accessed: 4.12.2024.');
        $this->migrator->add('explore_efficacy_tvasi.reference_3_en', '11. Hamzavi I, et al. \'Efficacy of Ruxolitinib Cream in Vitiligo by Patient Characteristics and Affected Body Areas: Descriptive Subgroup Analyses from a Phase 2, Randomized, Double-Blind Trial\'. Journal of the American Academy of Dermatology, 2022;86:1398–401');
        
        // References Section - Chinese
        $this->migrator->add('explore_efficacy_tvasi.references_title_zh', '參考文獻：');
        $this->migrator->add('explore_efficacy_tvasi.reference_1_zh', '2. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022;387(16):1445-55');
        $this->migrator->add('explore_efficacy_tvasi.reference_2_zh', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022年10月20日;387(16):1445-55。補充材料可在以下網址獲得：https://www.nejm.org/doi/suppl/10.1056/NEJMoa2118828/suppl_file/nejmoa2118828_appendix.pdf。最後訪問：2024年12月4日。');
        $this->migrator->add('explore_efficacy_tvasi.reference_3_zh', '11. Hamzavi I等。\'魯索利替尼乳膏在白癜風中的療效：按患者特徵和受影響身體區域的描述性亞組分析：來自2期隨機雙盲試驗的描述性亞組分析\'。美國皮膚病學會雜誌，2022;86:1398–401');
    }
};