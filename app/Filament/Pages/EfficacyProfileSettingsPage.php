<?php

namespace App\Filament\Pages;

use App\Settings\EfficacyProfileSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class EfficacyProfileSettingsPage extends SettingsPage
{
    protected static string $settings = EfficacyProfileSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $navigationLabel = 'Efficacy Profile Settings';
    protected static ?string $title = 'Efficacy Profile Page Settings';

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
                            ->directory('efficacy-profile/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_image_zh')
                            ->label('Header Image (Chinese)')
                            ->image()
                            ->directory('efficacy-profile/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_secondary_image_en')
                            ->label('Secondary Image (English)')
                            ->image()
                            ->directory('efficacy-profile/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_secondary_image_zh')
                            ->label('Secondary Image (Chinese)')
                            ->image()
                            ->directory('efficacy-profile/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Study Description Section')
                ->schema([
                    Grid::make(2)->schema([
                        Textarea::make('study_description_en')
                            ->label('Study Description (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(6),
                        Textarea::make('study_description_zh')
                            ->label('Study Description (Chinese)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(6),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('study_design_title_en')
                            ->label('Study Design Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('study_design_title_zh')
                            ->label('Study Design Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('study_design_image_en')
                            ->label('Study Design Image (English)')
                            ->image()
                            ->directory('efficacy-profile/study-design')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('study_design_image_zh')
                            ->label('Study Design Image (Chinese)')
                            ->image()
                            ->directory('efficacy-profile/study-design')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('study_note_1_en')
                            ->label('Study Note 1 (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('study_note_1_zh')
                            ->label('Study Note 1 (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('study_note_2_en')
                            ->label('Study Note 2 (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('study_note_2_zh')
                            ->label('Study Note 2 (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                ]),

            Section::make('Endpoints Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('primary_endpoint_title_en')
                            ->label('Primary Endpoint Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('primary_endpoint_title_zh')
                            ->label('Primary Endpoint Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('primary_endpoint_content_en')
                            ->label('Primary Endpoint Content (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('primary_endpoint_content_zh')
                            ->label('Primary Endpoint Content (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('key_secondary_endpoints_title_en')
                            ->label('Key Secondary Endpoints Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('key_secondary_endpoints_title_zh')
                            ->label('Key Secondary Endpoints Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('key_secondary_endpoints_content_en')
                            ->label('Key Secondary Endpoints Content (English)')
                            ->required()
                            ->maxLength(1500)
                            ->rows(5),
                        Textarea::make('key_secondary_endpoints_content_zh')
                            ->label('Key Secondary Endpoints Content (Chinese)')
                            ->required()
                            ->maxLength(1500)
                            ->rows(5),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('other_secondary_endpoints_title_en')
                            ->label('Other Secondary Endpoints Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('other_secondary_endpoints_title_zh')
                            ->label('Other Secondary Endpoints Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('other_secondary_endpoints_content_en')
                            ->label('Other Secondary Endpoints Content (English)')
                            ->required()
                            ->maxLength(1500)
                            ->rows(5),
                        Textarea::make('other_secondary_endpoints_content_zh')
                            ->label('Other Secondary Endpoints Content (Chinese)')
                            ->required()
                            ->maxLength(1500)
                            ->rows(5),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('face_definition_en')
                            ->label('Face Definition (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(4),
                        Textarea::make('face_definition_zh')
                            ->label('Face Definition (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(4),
                    ]),
                ]),

            Section::make('Demographics Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('demographics_title_en')
                            ->label('Demographics Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('demographics_title_zh')
                            ->label('Demographics Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('demographics_subtitle_en')
                            ->label('Demographics Subtitle (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('demographics_subtitle_zh')
                            ->label('Demographics Subtitle (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('demographics_image_en')
                            ->label('Demographics Image (English)')
                            ->image()
                            ->directory('efficacy-profile/demographics')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('demographics_image_zh')
                            ->label('Demographics Image (Chinese)')
                            ->image()
                            ->directory('efficacy-profile/demographics')
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
                    Grid::make(2)->schema([
                        Textarea::make('reference_2_en')
                            ->label('Reference 2 (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('reference_2_zh')
                            ->label('Reference 2 (Chinese)')
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
                        ->directory('efficacy-profile/og')
                        ->visibility('public')
                        ->required(),
                ]),
        ];
    }
}
