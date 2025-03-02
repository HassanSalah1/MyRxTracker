<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('app.days', 'My Website');
        $this->migrator->add('app.time', 'This is my website description.');
        $this->migrator->add('app.address', 'admin@example.com');
        $this->migrator->add('app.phone', '123456789');
        $this->migrator->add('app.instagram', 'https://instagram.com/myaccount');
        $this->migrator->add('app.facebook', 'https://facebook.com/myaccount');
        $this->migrator->add('app.site_url', 'https://example.com');
        $this->migrator->add('app.x', 'https://example.com');
        $this->migrator->add('app.youtube', 'https://example.com');
        $this->migrator->add('app.app_version', 1);
    }
};
