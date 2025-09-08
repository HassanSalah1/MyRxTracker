<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('dosing.pack_image', '/front-end/images/lumirix_pack.png');
    }
};


