<?php

namespace App\Filament\Pages;

use App\Settings\ExploreEfficacyFvasiSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class ExploreEfficacyFvasiSettingsPage extends SettingsPage
{
    protected static string $settings = ExploreEfficacyFvasiSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Explore Efficacy F-VASI Settings';
    protected static ?string $title = 'Explore Efficacy F-VASI Page Settings';

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
                            ->directory('explore-efficacy-fvasi/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_image_zh')
                            ->label('Header Image (Chinese)')
                            ->image()
                            ->directory('explore-efficacy-fvasi/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_secondary_image_en')
                            ->label('Secondary Image (English)')
                            ->image()
                            ->directory('explore-efficacy-fvasi/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_secondary_image_zh')
                            ->label('Secondary Image (Chinese)')
                            ->image()
                            ->directory('explore-efficacy-fvasi/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Tab Content Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('tab_1_title_en')
                            ->label('Tab 1 Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tab_1_title_zh')
                            ->label('Tab 1 Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('tab_2_title_en')
                            ->label('Tab 2 Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tab_2_title_zh')
                            ->label('Tab 2 Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('highlight_text_en')
                            ->label('Highlight Text (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('highlight_text_zh')
                            ->label('Highlight Text (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('efficacy_title_en')
                            ->label('Efficacy Title (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('efficacy_title_zh')
                            ->label('Efficacy Title (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('study_design_image_en')
                            ->label('Study Design Image (English)')
                            ->image()
                            ->directory('explore-efficacy-fvasi/study-design')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('study_design_image_zh')
                            ->label('Study Design Image (Chinese)')
                            ->image()
                            ->directory('explore-efficacy-fvasi/study-design')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('percentage_note_en')
                            ->label('Percentage Note (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(3),
                        Textarea::make('percentage_note_zh')
                            ->label('Percentage Note (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('year_data_title_en')
                            ->label('Year Data Title (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('year_data_title_zh')
                            ->label('Year Data Title (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('year_data_image_en')
                            ->label('Year Data Image (English)')
                            ->image()
                            ->directory('explore-efficacy-fvasi/year-data')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('year_data_image_zh')
                            ->label('Year Data Image (Chinese)')
                            ->image()
                            ->directory('explore-efficacy-fvasi/year-data')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('f_vasi_definition_en')
                            ->label('F-VASI Definition (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('f_vasi_definition_zh')
                            ->label('F-VASI Definition (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('chart_percentage_en')
                            ->label('Chart Percentage (English)')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('chart_percentage_zh')
                            ->label('Chart Percentage (Chinese)')
                            ->required()
                            ->maxLength(50),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('chart_description_en')
                            ->label('Chart Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('chart_description_zh')
                            ->label('Chart Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
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
                        ->directory('explore-efficacy-fvasi/og')
                        ->visibility('public')
                        ->required(),
                ]),
        ];
    }
}
