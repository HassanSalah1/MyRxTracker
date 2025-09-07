<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mechanism_of_action.abbreviations_en', '');
        $this->migrator->add('mechanism_of_action.abbreviations_zh', '');
    }
};


