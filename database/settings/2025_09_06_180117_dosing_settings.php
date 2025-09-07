<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Header Section - English
        $this->migrator->add('dosing.header_title_en', 'Dosing');
        $this->migrator->add('dosing.header_image_en', '/front-end/images/Dosing.png');
        $this->migrator->add('dosing.header_secondary_image_en', '/front-end/images/EfficacyProfile2.png');
        
        // Header Section - Chinese
        $this->migrator->add('dosing.header_title_zh', '劑量');
        $this->migrator->add('dosing.header_image_zh', '/front-end/images/Dosing.png');
        $this->migrator->add('dosing.header_secondary_image_zh', '/front-end/images/EfficacyProfile2.png');
        
        // Dosing Instructions - English
        $this->migrator->add('dosing.dosing_item_1_en', 'Apply a thin layer of Lumirix® cream twice daily to the affected areas of your skin. With at least 8 hours between applications.');
        $this->migrator->add('dosing.dosing_item_2_en', 'The cream should not be used on more than 10% (one-tenth) of the body surface area. This surface area represents the equivalent to ten times the palm of one hand with the five fingers.');
        $this->migrator->add('dosing.dosing_item_3_en', 'A minimum duration of 6 months is recommended but satisfactory treatment may require over 12 months. If the patient achieves satisfactory repigmentation of treated areas, they shall consult their doctor to discuss if treatment of those areas could be stopped. Consult your doctor if you experience loss of repigmentation after stopping treatment.');
        $this->migrator->add('dosing.dosing_item_4_en', 'Patients should not use more than two 100-gram tubes a month.');
        
        // Dosing Instructions - Chinese
        $this->migrator->add('dosing.dosing_item_1_zh', '每天兩次在皮膚受影響的區域塗抹一層薄薄的Lumirix®乳膏。兩次塗抹之間至少間隔8小時。');
        $this->migrator->add('dosing.dosing_item_2_zh', '乳膏不應使用於超過10%（十分之一）的體表面積。這個表面積相當於一隻手的手掌（包括五個手指）的十倍。');
        $this->migrator->add('dosing.dosing_item_3_zh', '建議最少使用6個月，但滿意的治療可能需要超過12個月。如果患者在治療區域達到滿意的重新色素沉著，他們應諮詢醫生討論是否可以停止治療這些區域。如果在停止治療後出現重新色素沉著喪失，請諮詢您的醫生。');
        $this->migrator->add('dosing.dosing_item_4_zh', '患者每月不應使用超過兩支100克的管裝乳膏。');
        
        // Meta Information - English
        $this->migrator->add('dosing.meta_title_en', 'Dosing Instructions - Lumirix');
        $this->migrator->add('dosing.meta_description_en', 'Learn about proper dosing instructions for Lumirix® (ruxolitinib) cream in vitiligo treatment.');
        $this->migrator->add('dosing.meta_keywords_en', 'Lumirix, dosing, ruxolitinib, vitiligo treatment, instructions');
        
        // Meta Information - Chinese
        $this->migrator->add('dosing.meta_title_zh', '劑量說明 - Lumirix');
        $this->migrator->add('dosing.meta_description_zh', '了解Lumirix®（魯索利替尼）乳膏治療白癜風的正確劑量說明。');
        $this->migrator->add('dosing.meta_keywords_zh', 'Lumirix, 劑量, 魯索利替尼, 白癜風治療, 說明');
        
        // Open Graph - English
        $this->migrator->add('dosing.og_title_en', 'Dosing Instructions - Lumirix');
        $this->migrator->add('dosing.og_description_en', 'Learn about proper dosing instructions for Lumirix® cream.');
        
        // Open Graph - Chinese
        $this->migrator->add('dosing.og_title_zh', '劑量說明 - Lumirix');
        $this->migrator->add('dosing.og_description_zh', '了解Lumirix®乳膏的正確劑量說明。');
        
        $this->migrator->add('dosing.og_image', '/front-end/images/og-dosing.png');
        
        // References Section - English
        $this->migrator->add('dosing.references_title_en', 'References:');
        $this->migrator->add('dosing.reference_1_en', '3. Lumirix® Prescribing Information for Hong Kong.');
        
        // References Section - Chinese
        $this->migrator->add('dosing.references_title_zh', '參考文獻：');
        $this->migrator->add('dosing.reference_1_zh', '3. Lumirix® 香港處方資訊。');
    }
};