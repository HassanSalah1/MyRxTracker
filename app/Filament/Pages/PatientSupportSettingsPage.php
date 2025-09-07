<?php

namespace App\Filament\Pages;

use App\Settings\PatientSupportSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class PatientSupportSettingsPage extends SettingsPage
{
    protected static string $settings = PatientSupportSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Patient Support Settings';
    protected static ?string $title = 'Patient Support Page Settings';

    public function getFormSchema(): array
    {
        return [
            Section::make('Header Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('header_title_en')
                            ->label('Header Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('header_title_zh')
                            ->label('Header Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_image_en')
                            ->label('Header Image (English)')
                            ->image()
                            ->directory('patient-support/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_image_zh')
                            ->label('Header Image (Chinese)')
                            ->image()
                            ->directory('patient-support/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_secondary_image_en')
                            ->label('Secondary Image (English)')
                            ->image()
                            ->directory('patient-support/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_secondary_image_zh')
                            ->label('Secondary Image (Chinese)')
                            ->image()
                            ->directory('patient-support/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Support Content')
                ->schema([
                    Grid::make(2)->schema([
                        Textarea::make('support_text_en')
                            ->label('Support Text (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(8),
                        Textarea::make('support_text_zh')
                            ->label('Support Text (Chinese)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(8),
                    ]),
                ]),

            Section::make('SEO & Meta Information')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('meta_title_en')
                            ->label('Meta Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('meta_title_zh')
                            ->label('Meta Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('meta_description_en')
                            ->label('Meta Description (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(3),
                        Textarea::make('meta_description_zh')
                            ->label('Meta Description (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('meta_keywords_en')
                            ->label('Meta Keywords (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('meta_keywords_zh')
                            ->label('Meta Keywords (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('og_title_en')
                            ->label('OG Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('og_title_zh')
                            ->label('OG Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('og_description_en')
                            ->label('OG Description (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(3),
                        Textarea::make('og_description_zh')
                            ->label('OG Description (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(3),
                    ]),
                    FileUpload::make('og_image')
                        ->label('OG Image')
                        ->image()
                        ->directory('patient-support/og')
                        ->visibility('public')
                        ->required(),
                ]),
        ];
    }
}
