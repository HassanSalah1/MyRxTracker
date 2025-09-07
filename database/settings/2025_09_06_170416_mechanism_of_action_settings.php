<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('mechanism_of_action.header_title_en', 'Explore the Mechanism of Action');
        $this->migrator->add('mechanism_of_action.header_image_en', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('mechanism_of_action.header_secondary_image_en', '/front-end/images/MechanismofAction.png');
        
        // Header Section - Chinese
        $this->migrator->add('mechanism_of_action.header_title_zh', '探索作用機制');
        $this->migrator->add('mechanism_of_action.header_image_zh', '/front-end/images/EfficacyProfile2.png');
        $this->migrator->add('mechanism_of_action.header_secondary_image_zh', '/front-end/images/MechanismofAction.png');
        
        // Section 1 - English
        $this->migrator->add('mechanism_of_action.section_1_title_en', 'IFN-ɣ driven Inflammation in Vitiligo is JAK-mediated⁴');
        $this->migrator->add('mechanism_of_action.section_1_content_en', 'IFN-γ mediated JAK-STAT signaling is thought to drive an inflammatory cycle, creating a hostile environment in which CD8+ T-cells target and destroy melanocytes.⁴ Autoimmune IFN-γ producing cytotoxic T lymphocytes are thought to be directly responsible for melanocyte destruction in human vitiligo.⁵');
        $this->migrator->add('mechanism_of_action.section_1_image_en', '/front-end/images/Asset.png');
        $this->migrator->add('mechanism_of_action.section_1_caption_en', 'Adapted from ref. 4');
        
        // Section 1 - Chinese
        $this->migrator->add('mechanism_of_action.section_1_title_zh', '白癜風中IFN-ɣ驅動的炎症是JAK介導的⁴');
        $this->migrator->add('mechanism_of_action.section_1_content_zh', 'IFN-γ介導的JAK-STAT信號傳導被認為會驅動炎症循環，創造一個惡劣的環境，其中CD8+ T細胞靶向並破壞黑素細胞。⁴ 自身免疫性IFN-γ產生細胞毒性T淋巴細胞被認為是人類白癜風中黑素細胞破壞的直接原因。⁵');
        $this->migrator->add('mechanism_of_action.section_1_image_zh', '/front-end/images/Asset.png');
        $this->migrator->add('mechanism_of_action.section_1_caption_zh', '改編自參考文獻4');
        
        // Section 2 - English
        $this->migrator->add('mechanism_of_action.section_2_title_en', 'The Role of the JAK-STAT Pathway in Vitiligo⁴');
        $this->migrator->add('mechanism_of_action.section_2_content_en', 'Intrinsic and/or extrinsic factors induce the cellular stress response in melanocytes, which then activates innate immunity within the skin to trigger the initial inflammation that leads to autoimmunity.⁴

1- CXCL9 and CXCL10 are released from keratinocytes, leading to the recruitment of CD8+ T cells.⁴

2- Activated CD8+T cells produce IFN-γ, which triggers more CXCL9 and CXCL10 production from keratinocytes through JAK1 and JAK2 signaling and recruits more CD8+ T cells to the inflamed sites.⁴

3- CD8+ T cells then destroy melanocytes and lead to depigmentation.⁴');
        
        // Section 2 - Chinese
        $this->migrator->add('mechanism_of_action.section_2_title_zh', 'JAK-STAT通路在白癜風中的作用⁴');
        $this->migrator->add('mechanism_of_action.section_2_content_zh', '內在和/或外在因素誘導黑素細胞的細胞應激反應，然後激活皮膚內的先天免疫，觸發導致自身免疫的初始炎症。⁴

1- CXCL9和CXCL10從角質形成細胞釋放，導致CD8+ T細胞的募集。⁴

2- 激活的CD8+T細胞產生IFN-γ，通過JAK1和JAK2信號傳導觸發角質形成細胞產生更多CXCL9和CXCL10，並募集更多CD8+ T細胞到炎症部位。⁴

3- CD8+ T細胞然後破壞黑素細胞並導致色素脫失。⁴');
        
        // Section 3 - English
        $this->migrator->add('mechanism_of_action.section_3_title_en', 'Lumirix® (ruxolitinib 15mg/g) cream is a Janus Kinase (JAK) Inhibitor.³');
        $this->migrator->add('mechanism_of_action.section_3_content_en', 'Ruxolitinib cream has been found to have physicochemical properties suitable for topical delivery through the skin of patients with inflammatory skin diseases.6');
        $this->migrator->add('mechanism_of_action.section_3_image_en', '/front-end/images/Asset2.png');
        $this->migrator->add('mechanism_of_action.section_3_caption_en', 'Adapted from ref. 7');
        
        // Section 3 - Chinese
        $this->migrator->add('mechanism_of_action.section_3_title_zh', 'Lumirix®（魯索利替尼15mg/g）乳膏是一種Janus激酶（JAK）抑制劑。³');
        $this->migrator->add('mechanism_of_action.section_3_content_zh', '已發現魯索利替尼乳膏具有適合通過炎症性皮膚疾病患者皮膚進行局部給藥的理化特性。6');
        $this->migrator->add('mechanism_of_action.section_3_image_zh', '/front-end/images/Asset2.png');
        $this->migrator->add('mechanism_of_action.section_3_caption_zh', '改編自參考文獻7');
        
        // Section 4 - English
        $this->migrator->add('mechanism_of_action.section_4_title_en', 'Lumirix® (ruxolitinib 15mg/g) cream can be a promising treatment for vitiligo.⁸');
        $this->migrator->add('mechanism_of_action.section_4_content_en', 'In addition to Ruxolitinib\'s anti-IFN-γ effect, it also seems to activate the hair follicle melanocyte stem cell.⁸');
        
        // Section 4 - Chinese
        $this->migrator->add('mechanism_of_action.section_4_title_zh', 'Lumirix®（魯索利替尼15mg/g）乳膏可能是白癜風的有前景的治療方法。⁸');
        $this->migrator->add('mechanism_of_action.section_4_content_zh', '除了魯索利替尼的抗IFN-γ作用外，它似乎還能激活毛囊黑素細胞幹細胞。⁸');
        
        // Meta Information - English
        $this->migrator->add('mechanism_of_action.meta_title_en', 'Mechanism of Action - Lumirix');
        $this->migrator->add('mechanism_of_action.meta_description_en', 'Explore the mechanism of action of Lumirix® (ruxolitinib) cream for vitiligo treatment. Learn about JAK-STAT pathway inhibition and IFN-γ effects.');
        $this->migrator->add('mechanism_of_action.meta_keywords_en', 'Lumirix, mechanism of action, ruxolitinib, JAK inhibitor, vitiligo treatment, IFN-γ, JAK-STAT pathway');
        
        // Meta Information - Chinese
        $this->migrator->add('mechanism_of_action.meta_title_zh', '作用機制 - Lumirix');
        $this->migrator->add('mechanism_of_action.meta_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的作用機制。了解JAK-STAT通路抑制和IFN-γ作用。');
        $this->migrator->add('mechanism_of_action.meta_keywords_zh', 'Lumirix, 作用機制, 魯索利替尼, JAK抑制劑, 白癜風治療, IFN-γ, JAK-STAT通路');
        
        // Open Graph - English
        $this->migrator->add('mechanism_of_action.og_title_en', 'Mechanism of Action - Lumirix');
        $this->migrator->add('mechanism_of_action.og_description_en', 'Explore the mechanism of action of Lumirix® (ruxolitinib) cream for vitiligo treatment.');
        
        // Open Graph - Chinese
        $this->migrator->add('mechanism_of_action.og_title_zh', '作用機制 - Lumirix');
        $this->migrator->add('mechanism_of_action.og_description_zh', '探索Lumirix®（魯索利替尼）乳膏治療白癜風的作用機制。');
        
        $this->migrator->add('mechanism_of_action.og_image', '/front-end/images/og-mechanism.png');
        
        // References Section - English
        $this->migrator->add('mechanism_of_action.references_title_en', 'References:');
        $this->migrator->add('mechanism_of_action.reference_1_en', '3. Lumirix® Prescribing Information for Hong Kong.');
        $this->migrator->add('mechanism_of_action.reference_2_en', '4. Howell MD, Kuo FI, Smith PA. Targeting the Janus kinase family in autoimmune skin diseases. Front Immunol. 2019; 10: 2342 [Internet]. 2019.');
        $this->migrator->add('mechanism_of_action.reference_3_en', '5. Frisoli ML, Essien K, Harris JE. Vitiligo: mechanisms of pathogenesis and treatment. Annual review of immunology. 2020;38(1):621-48.');
        $this->migrator->add('mechanism_of_action.reference_4_en', '6. Smith P, Yao W, Shepard S, Covington M, Lee J, Lofland J, Naim A, Sheth T, Parikh B, Yeleswaram S. Developing a JAK inhibitor for targeted local delivery: ruxolitinib cream. Pharmaceutics. 2021;13(7):1044.');
        $this->migrator->add('mechanism_of_action.reference_5_en', '7. Utama A, Wijesinghe R, Thng S. Janus kinase inhibitors and the changing landscape of vitiligo management: a scoping review. International Journal of Dermatology. 2024 Apr 12.');
        $this->migrator->add('mechanism_of_action.reference_6_en', '8. Birlea SA, Goldstein NB, Norris DA. Repigmentation through melanocyte regeneration in vitiligo. Dermatologic clinics. 2017 Apr 1;35(2):205-18.');
        
        // References Section - Chinese
        $this->migrator->add('mechanism_of_action.references_title_zh', '參考文獻：');
        $this->migrator->add('mechanism_of_action.reference_1_zh', '3. Lumirix® 香港處方資訊。');
        $this->migrator->add('mechanism_of_action.reference_2_zh', '4. Howell MD, Kuo FI, Smith PA. 在自身免疫性皮膚疾病中靶向Janus激酶家族。Front Immunol. 2019; 10: 2342 [Internet]. 2019。');
        $this->migrator->add('mechanism_of_action.reference_3_zh', '5. Frisoli ML, Essien K, Harris JE. 白癜風：發病機制和治療機制。免疫學年鑑。2020;38(1):621-48。');
        $this->migrator->add('mechanism_of_action.reference_4_zh', '6. Smith P, Yao W, Shepard S, Covington M, Lee J, Lofland J, Naim A, Sheth T, Parikh B, Yeleswaram S. 開發用於靶向局部給藥的JAK抑制劑：魯索利替尼乳膏。藥劑學。2021;13(7):1044。');
        $this->migrator->add('mechanism_of_action.reference_5_zh', '7. Utama A, Wijesinghe R, Thng S. Janus激酶抑制劑和白癜風管理格局的變化：範圍審查。國際皮膚病學雜誌。2024年4月12日。');
        $this->migrator->add('mechanism_of_action.reference_6_zh', '8. Birlea SA, Goldstein NB, Norris DA. 白癜風中通過黑素細胞再生的色素沉著。皮膚科診所。2017年4月1日;35(2):205-18。');
    }
};
