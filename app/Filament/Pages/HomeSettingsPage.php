<?php

namespace App\Filament\Pages;

use App\Settings\HomeSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class HomeSettingsPage extends SettingsPage
{
    protected static string $settings = HomeSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $navigationLabel = 'Home Settings';
    protected static ?string $title = 'Home Page Settings';

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
                        Textarea::make('header_subtitle_en')
                            ->label('Header Subtitle (English)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                        Textarea::make('header_subtitle_zh')
                            ->label('Header Subtitle (Chinese)')
                            ->required()
                            ->maxLength(500)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('header_button_text_en')
                            ->label('Button Text (English)')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('header_button_text_zh')
                            ->label('Button Text (Chinese)')
                            ->required()
                            ->maxLength(100),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('header_button_link')
                            ->label('Button Link')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        FileUpload::make('header_image')
                            ->label('Header Image')
                            ->image()
                            ->directory('home/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Why Choose Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('why_choose_title_en')
                            ->label('Section Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('why_choose_title_zh')
                            ->label('Section Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('why_choose_subtitle_en')
                            ->label('Section Subtitle (English)')
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('why_choose_subtitle_zh')
                            ->label('Section Subtitle (Chinese)')
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                ]),

            Section::make('Feature 1')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('feature_1_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('feature_1_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('feature_1_description_en')
                            ->label('Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('feature_1_description_zh')
                            ->label('Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_1_link_text_en')
                            ->label('Link Text (English)')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('feature_1_link_text_zh')
                            ->label('Link Text (Chinese)')
                            ->required()
                            ->maxLength(100),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_1_link_url')
                            ->label('Link URL')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        FileUpload::make('feature_1_image')
                            ->label('Image')
                            ->image()
                            ->directory('home/features')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Feature 2')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('feature_2_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('feature_2_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('feature_2_description_en')
                            ->label('Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('feature_2_description_zh')
                            ->label('Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_2_link_text_en')
                            ->label('Link Text (English)')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('feature_2_link_text_zh')
                            ->label('Link Text (Chinese)')
                            ->required()
                            ->maxLength(100),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_2_link_url')
                            ->label('Link URL')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        FileUpload::make('feature_2_image')
                            ->label('Image')
                            ->image()
                            ->directory('home/features')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Feature 3')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('feature_3_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('feature_3_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('feature_3_description_en')
                            ->label('Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('feature_3_description_zh')
                            ->label('Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_3_link_text_en')
                            ->label('Link Text (English)')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('feature_3_link_text_zh')
                            ->label('Link Text (Chinese)')
                            ->required()
                            ->maxLength(100),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_3_link_url')
                            ->label('Link URL')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        FileUpload::make('feature_3_image')
                            ->label('Image')
                            ->image()
                            ->directory('home/features')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Feature 4')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('feature_4_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('feature_4_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('feature_4_description_en')
                            ->label('Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('feature_4_description_zh')
                            ->label('Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_4_link_text_en')
                            ->label('Link Text (English)')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('feature_4_link_text_zh')
                            ->label('Link Text (Chinese)')
                            ->required()
                            ->maxLength(100),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('feature_4_link_url')
                            ->label('Link URL')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        FileUpload::make('feature_4_image')
                            ->label('Image')
                            ->image()
                            ->directory('home/features')
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
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('reference_1_zh')
                            ->label('Reference 1 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('reference_2_en')
                            ->label('Reference 2 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('reference_2_zh')
                            ->label('Reference 2 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('reference_3_en')
                            ->label('Reference 3 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('reference_3_zh')
                            ->label('Reference 3 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                ]),
            Section::make('SEO & Meta Information')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('meta_title_en')
                            ->label('Meta Title (English)')
                            ->required()
                            ->maxLength(60),
                        TextInput::make('meta_title_zh')
                            ->label('Meta Title (Chinese)')
                            ->required()
                            ->maxLength(60),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('meta_description_en')
                            ->label('Meta Description (English)')
                            ->required()
                            ->maxLength(160)
                            ->rows(2),
                        Textarea::make('meta_description_zh')
                            ->label('Meta Description (Chinese)')
                            ->required()
                            ->maxLength(160)
                            ->rows(2),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('meta_keywords_en')
                            ->label('Meta Keywords (English)')
                            ->maxLength(255),
                        TextInput::make('meta_keywords_zh')
                            ->label('Meta Keywords (Chinese)')
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('og_title_en')
                            ->label('Open Graph Title (English)')
                            ->maxLength(60),
                        TextInput::make('og_title_zh')
                            ->label('Open Graph Title (Chinese)')
                            ->maxLength(60),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('og_description_en')
                            ->label('Open Graph Description (English)')
                            ->maxLength(160)
                            ->rows(2),
                        Textarea::make('og_description_zh')
                            ->label('Open Graph Description (Chinese)')
                            ->maxLength(160)
                            ->rows(2),
                    ]),
                    FileUpload::make('og_image')
                        ->label('Open Graph Image')
                        ->image()
                        ->directory('home/og')
                        ->visibility('public'),
                ])->collapsible()
                ->collapsed(),

            
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->hasPermission('manage-settings');
    }
}
