<?php

namespace App\Providers;

use App\Settings\AppSettings;
use App\Settings\SiteSettings;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelSettings\SettingsContainer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        app(SettingsContainer::class)->register(SiteSettings::class);
//        app(SettingsContainer::class)->register(AppSettings::class);
    }
}
