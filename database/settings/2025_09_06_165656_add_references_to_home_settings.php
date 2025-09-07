<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
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
