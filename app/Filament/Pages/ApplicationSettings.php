<?php

namespace App\Filament\Pages;

use App\Enums\ApplicationMode;
use App\Settings\AppSettings;
use Filament\Forms\Components\Grid;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

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
            Section::make('General Information')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('days')->label('Days')->required(),
                        TextInput::make('time')->label('Time')->required(),
                        TextInput::make('address')->label('Address')->required(),
                    ])

                ]),

            // القسم الثاني: معلومات التواصل
            Section::make('Contact Information')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('email')->label('Email')->email()->required(),
                        TextInput::make('phone')->label('Phone')->required(),
                    ])
                ]),

            // القسم الثالث: إعدادات التطبيق


            // القسم الرابع: روابط وسائل التواصل الاجتماعي
            Section::make('Social Media Links')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('instagram')->label('Instagram')->url(),
                        TextInput::make('x')->label('X')->url(),
                        TextInput::make('youtube')->label('Youtube')->url(),
                        TextInput::make('facebook')->label('Facebook')->url(),
                        TextInput::make('site_url')->label('Site URL')->url()->required(),
                    ])
                ]),
            Section::make('Application Settings')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('app_version')->label('App Version')->required(),
                        Select::make('mode')->label('Application Mode')->options(ApplicationMode::class),
                    ])
                ]),
            ];

    }

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->hasPermission('manage-settings');
    }
}
