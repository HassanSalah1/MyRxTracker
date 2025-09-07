<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('efficacy_profile.header_title_en', 'Efficacy PROFILE');
        $this->migrator->add('efficacy_profile.header_subtitle_en', 'Understand the Study Design');
        $this->migrator->add('efficacy_profile.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('efficacy_profile.header_secondary_image_en', '/front-end/images/EfficacyProfile.png');
        
        // Header Section - Chinese
        $this->migrator->add('efficacy_profile.header_title_zh', '療效概況');
        $this->migrator->add('efficacy_profile.header_subtitle_zh', '了解研究設計');
        $this->migrator->add('efficacy_profile.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('efficacy_profile.header_secondary_image_zh', '/front-end/images/EfficacyProfile.png');
        
        // Study Description Section - English
        $this->migrator->add('efficacy_profile.study_description_en', 'Two Phase 3, double-blind, vehicle-controlled trials Topical Ruxolitinib Evaluation in Vitiligo Study 1 [TRuE-V1] and [TRuE-V2] examined the efficacy of ruxolitinib cream for repigmentation of skin lesions in adolescents and adults with nonsegmental vitiligo.');
        $this->migrator->add('efficacy_profile.study_design_title_en', 'TRuE-V1 and TRuE-V2 Study Design ⁹');
        $this->migrator->add('efficacy_profile.study_design_image_en', '/front-end/images/StudyDesign.png');
        $this->migrator->add('efficacy_profile.study_note_1_en', '*1 randomized patient who did not apply ≥1 dose of Ruxolitinib cream was excluded from safety analyses.');
        $this->migrator->add('efficacy_profile.study_note_2_en', '13 patients from 1 study site were excluded from efficacy analyses for compliance issues.');
        
        // Study Description Section - Chinese
        $this->migrator->add('efficacy_profile.study_description_zh', '兩項3期雙盲、載體對照試驗，局部魯索利替尼治療白癜風評估研究1 [TRuE-V1] 和 [TRuE-V2] 檢查了魯索利替尼乳膏對青少年和成人非節段性白癜風皮膚病變色素沉著的療效。');
        $this->migrator->add('efficacy_profile.study_design_title_zh', 'TRuE-V1和TRuE-V2研究設計⁹');
        $this->migrator->add('efficacy_profile.study_design_image_zh', '/front-end/images/StudyDesign.png');
        $this->migrator->add('efficacy_profile.study_note_1_zh', '*1名未應用≥1劑量魯索利替尼乳膏的隨機患者被排除在安全性分析之外。');
        $this->migrator->add('efficacy_profile.study_note_2_zh', '1個研究地點的13名患者因合規問題被排除在療效分析之外。');
        
        // Endpoints Section - English
        $this->migrator->add('efficacy_profile.primary_endpoint_title_en', 'Primary Endpoint');
        $this->migrator->add('efficacy_profile.primary_endpoint_content_en', '% of patients achieving an F-VASI75 response at week 24.');
        $this->migrator->add('efficacy_profile.key_secondary_endpoints_title_en', 'Key Secondary Endpoints (all at week 24) ²');
        $this->migrator->add('efficacy_profile.key_secondary_endpoints_content_en', '% of patients achieving F-VASI50 and F-VASI90 responses.
% of patients achieving a T-VASI50 response.
% of patients achieving a VNS response of 4 (\'a lot less noticeable\') or 5 (\'no longer noticeable\').
% change from baseline in affected F-BSA.');
        $this->migrator->add('efficacy_profile.other_secondary_endpoints_title_en', 'Other Secondary Endpoints ²');
        $this->migrator->add('efficacy_profile.other_secondary_endpoints_content_en', 'Safety and tolerability.
% change from baseline in F-VASI, T-VASI, affected F-BSA and T-BSA during the treatment period.
% of patients having F-VASI improvements or T-VASI improvements.');
        $this->migrator->add('efficacy_profile.face_definition_en', 'The face includes the area on the forehead to the original hairline, on the cheek to the jawline vertically and laterally from the corner of the mouth to the tragus. It includes the surface area of the nose but not that of the lips, scalp, eyelids, ears, or neck.²
VNS was assessed for facial lesions only.²');
        
        // Endpoints Section - Chinese
        $this->migrator->add('efficacy_profile.primary_endpoint_title_zh', '主要終點');
        $this->migrator->add('efficacy_profile.primary_endpoint_content_zh', '在第24週達到F-VASI75反應的患者百分比。');
        $this->migrator->add('efficacy_profile.key_secondary_endpoints_title_zh', '關鍵次要終點（均在第24週）²');
        $this->migrator->add('efficacy_profile.key_secondary_endpoints_content_zh', '達到F-VASI50和F-VASI90反應的患者百分比。
達到T-VASI50反應的患者百分比。
達到VNS反應4（「明顯減少」）或5（「不再明顯」）的患者百分比。
受影響F-BSA相對於基線的變化百分比。');
        $this->migrator->add('efficacy_profile.other_secondary_endpoints_title_zh', '其他次要終點²');
        $this->migrator->add('efficacy_profile.other_secondary_endpoints_content_zh', '安全性和耐受性。
治療期間F-VASI、T-VASI、受影響F-BSA和T-BSA相對於基線的變化百分比。
有F-VASI改善或T-VASI改善的患者百分比。');
        $this->migrator->add('efficacy_profile.face_definition_zh', '面部包括從前額到原始髮際線的區域，從嘴角到耳屏垂直和側向從臉頰到下巴線的區域。它包括鼻子的表面積，但不包括嘴唇、頭皮、眼瞼、耳朵或頸部的表面積。²
VNS僅針對面部病變進行評估。²');
        
        // Demographics Section - English
        $this->migrator->add('efficacy_profile.demographics_title_en', 'Patient Demographics and Clinical Characteristics ²');
        $this->migrator->add('efficacy_profile.demographics_subtitle_en', 'Baseline demographics and clinical characteristics were similar for TRuE-V1 and TRuE-V2.');
        $this->migrator->add('efficacy_profile.demographics_image_en', '/front-end/images/Demographics.png');
        
        // Demographics Section - Chinese
        $this->migrator->add('efficacy_profile.demographics_title_zh', '患者人口統計學和臨床特徵²');
        $this->migrator->add('efficacy_profile.demographics_subtitle_zh', 'TRuE-V1和TRuE-V2的基線人口統計學和臨床特徵相似。');
        $this->migrator->add('efficacy_profile.demographics_image_zh', '/front-end/images/Demographics.png');
        
        // Meta Information - English
        $this->migrator->add('efficacy_profile.meta_title_en', 'Efficacy Profile - Lumirix');
        $this->migrator->add('efficacy_profile.meta_description_en', 'Explore the efficacy profile of Lumirix® (ruxolitinib) cream for vitiligo treatment. Learn about study design and clinical endpoints.');
        $this->migrator->add('efficacy_profile.meta_keywords_en', 'Lumirix, efficacy profile, ruxolitinib, vitiligo treatment, study design, clinical endpoints');
        
        // Meta Information - Chinese
        $this->migrator->add('efficacy_profile.meta_title_zh', '療效概況 - Lumirix');
        $this->migrator->add('efficacy_profile.meta_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的療效概況。了解研究設計和臨床終點。');
        $this->migrator->add('efficacy_profile.meta_keywords_zh', 'Lumirix, 療效概況, 魯索利替尼, 白癜風治療, 研究設計, 臨床終點');
        
        // Open Graph - English
        $this->migrator->add('efficacy_profile.og_title_en', 'Efficacy Profile - Lumirix');
        $this->migrator->add('efficacy_profile.og_description_en', 'Explore the efficacy profile of Lumirix® (ruxolitinib) cream for vitiligo treatment.');
        
        // Open Graph - Chinese
        $this->migrator->add('efficacy_profile.og_title_zh', '療效概況 - Lumirix');
        $this->migrator->add('efficacy_profile.og_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的療效概況。');
        
        $this->migrator->add('efficacy_profile.og_image', '/front-end/images/og-efficacy.png');
        
        // References Section - English
        $this->migrator->add('efficacy_profile.references_title_en', 'References');
        $this->migrator->add('efficacy_profile.reference_1_en', '2. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of Ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55.');
        $this->migrator->add('efficacy_profile.reference_2_en', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of ruxolitinib cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55. Supplementary material.');
        
        // References Section - Chinese
        $this->migrator->add('efficacy_profile.references_title_zh', '參考文獻');
        $this->migrator->add('efficacy_profile.reference_1_zh', '2. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022年10月20日;387(16):1445-55。');
        $this->migrator->add('efficacy_profile.reference_2_zh', '9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M, Seneschal J, Wolkerstorfer A, Kornacki D. 魯索利替尼乳膏治療白癜風的兩項3期隨機對照試驗。新英格蘭醫學雜誌。2022年10月20日;387(16):1445-55。補充材料。');
    }
};