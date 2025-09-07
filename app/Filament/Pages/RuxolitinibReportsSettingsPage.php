<?php

namespace App\Filament\Pages;

use App\Settings\RuxolitinibReportsSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class RuxolitinibReportsSettingsPage extends SettingsPage
{
    protected static string $settings = RuxolitinibReportsSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Ruxolitinib Reports Settings';
    protected static ?string $title = 'Ruxolitinib Reports Page Settings';

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
                        TextInput::make('header_subtitle_en')
                            ->label('Header Subtitle (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('header_subtitle_zh')
                            ->label('Header Subtitle (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_image_en')
                            ->label('Header Image (English)')
                            ->image()
                            ->directory('ruxolitinib-reports/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_image_zh')
                            ->label('Header Image (Chinese)')
                            ->image()
                            ->directory('ruxolitinib-reports/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Images Section')
                ->schema([
                    Grid::make(2)->schema([
                        FileUpload::make('image_1_en')
                            ->label('Image 1 (English)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('image_1_zh')
                            ->label('Image 1 (Chinese)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('image_2_en')
                            ->label('Image 2 (English)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('image_2_zh')
                            ->label('Image 2 (Chinese)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('image_3_en')
                            ->label('Image 3 (English)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('image_3_zh')
                            ->label('Image 3 (Chinese)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('image_4_en')
                            ->label('Image 4 (English)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('image_4_zh')
                            ->label('Image 4 (Chinese)')
                            ->image()
                            ->directory('ruxolitinib-reports/images')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('References Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('references_title_en')
                            ->label('References Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('references_title_zh')
                            ->label('References Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('reference_1_en')
                            ->label('Reference 1 (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('reference_1_zh')
                            ->label('Reference 1 (Chinese)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
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
                        ->directory('ruxolitinib-reports/og')
                        ->visibility('public')
                        ->required(),
                ]),
        ];
    }
}
