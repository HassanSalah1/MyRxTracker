<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('explore_efficacy_fvasi.header_title_en', 'Efficacy PROFILE');
        $this->migrator->add('explore_efficacy_fvasi.header_subtitle_en', 'Explore Lumirix Efficacy');
        $this->migrator->add('explore_efficacy_fvasi.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('explore_efficacy_fvasi.header_secondary_image_en', '/front-end/images/f-vasi.png');
        
        // Header Section - Chinese
        $this->migrator->add('explore_efficacy_fvasi.header_title_zh', '療效概況');
        $this->migrator->add('explore_efficacy_fvasi.header_subtitle_zh', '探索Lumirix療效');
        $this->migrator->add('explore_efficacy_fvasi.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('explore_efficacy_fvasi.header_secondary_image_zh', '/front-end/images/f-vasi.png');
        
        // Tab Content Section - English
        $this->migrator->add('explore_efficacy_fvasi.tab_1_title_en', '24- & 52-week data');
        $this->migrator->add('explore_efficacy_fvasi.tab_2_title_en', '2-year data');
        $this->migrator->add('explore_efficacy_fvasi.highlight_text_en', 'Half the patients who applied Ruxolitinib reached F-VASI75 at week 52.');
        $this->migrator->add('explore_efficacy_fvasi.efficacy_title_en', 'Efficacy of Ruxolitinib Application on the Primary Endpoint F-VASI75 Response.');
        $this->migrator->add('explore_efficacy_fvasi.study_design_image_en', '/front-end/images/weekData.png');
        $this->migrator->add('explore_efficacy_fvasi.percentage_note_en', 'ᵃ Percentage calculated from pooled figures of the identical TRuE-V1 and TRuE-V2 study, rounded off to the nearest whole number.');
        $this->migrator->add('explore_efficacy_fvasi.year_data_title_en', 'Efficacy of Ruxolitinib Treatment in Achieving an F-VASI75 Response at Week 52 to 104 ¹⁰');
        $this->migrator->add('explore_efficacy_fvasi.year_data_image_en', '/front-end/images/yearData.png');
        $this->migrator->add('explore_efficacy_fvasi.f_vasi_definition_en', 'F-VASI: Facial Vitiligo Area Scoring Index.');
        $this->migrator->add('explore_efficacy_fvasi.chart_percentage_en', '66.1%');
        $this->migrator->add('explore_efficacy_fvasi.chart_description_en', 'of patients who applied Ruxolitinib cream since day 1 achieved F-VASI75 at week 104 (LTE end-of-treatment).');
        
        // Tab Content Section - Chinese
        $this->migrator->add('explore_efficacy_fvasi.tab_1_title_zh', '24週和52週數據');
        $this->migrator->add('explore_efficacy_fvasi.tab_2_title_zh', '2年數據');
        $this->migrator->add('explore_efficacy_fvasi.highlight_text_zh', '使用魯索利替尼的患者中有一半在第52週達到F-VASI75。');
        $this->migrator->add('explore_efficacy_fvasi.efficacy_title_zh', '魯索利替尼應用在主要終點F-VASI75反應上的療效。');
        $this->migrator->add('explore_efficacy_fvasi.study_design_image_zh', '/front-end/images/weekData.png');
        $this->migrator->add('explore_efficacy_fvasi.percentage_note_zh', 'ᵃ 百分比是從相同的TRuE-V1和TRuE-V2研究的匯總數據計算得出，四捨五入到最接近的整數。');
        $this->migrator->add('explore_efficacy_fvasi.year_data_title_zh', '魯索利替尼治療在第52週至104週達到F-VASI75反應的療效¹⁰');
        $this->migrator->add('explore_efficacy_fvasi.year_data_image_zh', '/front-end/images/yearData.png');
        $this->migrator->add('explore_efficacy_fvasi.f_vasi_definition_zh', 'F-VASI：面部白癜風面積評分指數。');
        $this->migrator->add('explore_efficacy_fvasi.chart_percentage_zh', '66.1%');
        $this->migrator->add('explore_efficacy_fvasi.chart_description_zh', '從第1天開始使用魯索利替尼乳膏的患者在第104週達到F-VASI75（LTE治療結束）。');
        
        // Meta Information - English
        $this->migrator->add('explore_efficacy_fvasi.meta_title_en', 'Explore Lumirix Efficacy F-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_fvasi.meta_description_en', 'Explore the efficacy of Lumirix® (ruxolitinib) cream for vitiligo treatment with F-VASI data and clinical results.');
        $this->migrator->add('explore_efficacy_fvasi.meta_keywords_en', 'Lumirix, efficacy, ruxolitinib, vitiligo treatment, F-VASI, clinical results');
        
        // Meta Information - Chinese
        $this->migrator->add('explore_efficacy_fvasi.meta_title_zh', '探索Lumirix療效F-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_fvasi.meta_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的療效，包括F-VASI數據和臨床結果。');
        $this->migrator->add('explore_efficacy_fvasi.meta_keywords_zh', 'Lumirix, 療效, 魯索利替尼, 白癜風治療, F-VASI, 臨床結果');
        
        // Open Graph - English
        $this->migrator->add('explore_efficacy_fvasi.og_title_en', 'Explore Lumirix Efficacy F-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_fvasi.og_description_en', 'Explore the efficacy of Lumirix® (ruxolitinib) cream for vitiligo treatment.');
        
        // Open Graph - Chinese
        $this->migrator->add('explore_efficacy_fvasi.og_title_zh', '探索Lumirix療效F-VASI - Lumirix');
        $this->migrator->add('explore_efficacy_fvasi.og_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的療效。');
        
        $this->migrator->add('explore_efficacy_fvasi.og_image', '/front-end/images/og-explore-fvasi.png');
        
        // References Section - English
        $this->migrator->add('explore_efficacy_fvasi.references_title_en', 'Reference:');
        $this->migrator->add('explore_efficacy_fvasi.reference_1_en', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55. Supplementary material.');
        
        // References Section - Chinese
        $this->migrator->add('explore_efficacy_fvasi.references_title_zh', '參考文獻：');
        $this->migrator->add('explore_efficacy_fvasi.reference_1_zh', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022年10月20日;387(16):1445-55。補充材料。');
    }
};