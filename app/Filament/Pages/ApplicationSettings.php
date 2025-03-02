<?php

namespace App\Filament\Pages;

use App\Settings\AppSettings;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Pages\SettingsPage;

class ApplicationSettings extends SettingsPage
{
    protected static string $settings = AppSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Setting';

    public static function getNavigationLabel(): string
    {
        return "Application Setting";
    }

    public function getFormSchema(): array
    {
        return  [

                Forms\Components\TextInput::make('days')->label("Days")->required(),
                Forms\Components\TextInput::make('time')->label("Time")->required(),
                Forms\Components\TextInput::make('address')->label("Address")->required(),
                Forms\Components\TextInput::make('email')->label("Email")->email()->required(),
                Forms\Components\TextInput::make('phone')->label("phone")->required(),
                Forms\Components\TextInput::make('app_version')->label("App Version")->required(),
                Forms\Components\TextInput::make('instagram')->label("Instagram")->url(),
                Forms\Components\TextInput::make('site_url')->label("Site Url")->url()->required(),
                Forms\Components\TextInput::make('x')->label("X")->url(),
                Forms\Components\TextInput::make('youtube')->label("Youtube")->url(),
                Forms\Components\TextInput::make('facebook')->label("Facebook")->url(),

            ];
    }
}
