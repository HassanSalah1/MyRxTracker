<?php

namespace App\Filament\Pages;

use App\Settings\SafetyProfileSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class SafetyProfileSettingsPage extends SettingsPage
{
    protected static string $settings = SafetyProfileSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $navigationLabel = 'Safety Profile Settings';
    protected static ?string $title = 'Safety Profile Page Settings';

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
                            ->directory('safety-profile/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_image_zh')
                            ->label('Header Image (Chinese)')
                            ->image()
                            ->directory('safety-profile/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_secondary_image_en')
                            ->label('Secondary Image (English)')
                            ->image()
                            ->directory('safety-profile/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_secondary_image_zh')
                            ->label('Secondary Image (Chinese)')
                            ->image()
                            ->directory('safety-profile/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Safety Points Section')
                ->schema([
                    Grid::make(2)->schema([
                        Textarea::make('safety_point_1_en')
                            ->label('Safety Point 1 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('safety_point_1_zh')
                            ->label('Safety Point 1 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('safety_point_2_en')
                            ->label('Safety Point 2 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('safety_point_2_zh')
                            ->label('Safety Point 2 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                ]),

            Section::make('Adverse Reactions Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('adverse_title_en')
                            ->label('Adverse Reactions Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('adverse_title_zh')
                            ->label('Adverse Reactions Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('adverse_subtitle_en')
                            ->label('Adverse Reactions Subtitle (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('adverse_subtitle_zh')
                            ->label('Adverse Reactions Subtitle (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('adverse_image_en')
                            ->label('Adverse Reactions Image (English)')
                            ->image()
                            ->directory('safety-profile/adverse')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('adverse_image_zh')
                            ->label('Adverse Reactions Image (Chinese)')
                            ->image()
                            ->directory('safety-profile/adverse')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('adverse_note_1_en')
                            ->label('Adverse Note 1 (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('adverse_note_1_zh')
                            ->label('Adverse Note 1 (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('adverse_note_2_en')
                            ->label('Adverse Note 2 (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('adverse_note_2_zh')
                            ->label('Adverse Note 2 (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
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
                        ->directory('safety-profile/og')
                        ->visibility('public')
                        ->required(),
                ]),
        ];
    }
}
