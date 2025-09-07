<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Terms
        $this->migrator->add('terms_policy.title_en', 'Terms of Use');
        $this->migrator->add('terms_policy.title_zh', '使用条款');
        $this->migrator->add('terms_policy.content_en', '<section><h2 class="h4 mt-4">Overview</h2><p>...</p></section>');
        $this->migrator->add('terms_policy.content_zh', '<section><h2 class="h4 mt-4">概述</h2><p>...</p></section>');

        // Privacy
        $this->migrator->add('privacy_policy.title_en', 'Privacy Policy');
        $this->migrator->add('privacy_policy.title_zh', '隐私政策');
        $this->migrator->add('privacy_policy.content_en', '<section><h2 class="h4 mt-4">Introduction</h2><p>...</p></section>');
        $this->migrator->add('privacy_policy.content_zh', '<section><h2 class="h4 mt-4">介绍</h2><p>...</p></section>');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->migrator->delete('terms_policy.title_en');
        $this->migrator->delete('terms_policy.title_zh');
        $this->migrator->delete('terms_policy.content_en');
        $this->migrator->delete('terms_policy.content_zh');

        $this->migrator->delete('privacy_policy.title_en');
        $this->migrator->delete('privacy_policy.title_zh');
        $this->migrator->delete('privacy_policy.content_en');
        $this->migrator->delete('privacy_policy.content_zh');
    }
};
