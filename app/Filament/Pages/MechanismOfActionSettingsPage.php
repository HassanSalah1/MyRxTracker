<?php

namespace App\Filament\Pages;

use App\Settings\MechanismOfActionSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class MechanismOfActionSettingsPage extends SettingsPage
{
    protected static string $settings = MechanismOfActionSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $navigationLabel = 'Mechanism of Action Settings';
    protected static ?string $title = 'Mechanism of Action Page Settings';

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
                            ->directory('mechanism-of-action/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_image_zh')
                            ->label('Header Image (Chinese)')
                            ->image()
                            ->directory('mechanism-of-action/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_secondary_image_en')
                            ->label('Secondary Image (English)')
                            ->image()
                            ->directory('mechanism-of-action/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_secondary_image_zh')
                            ->label('Secondary Image (Chinese)')
                            ->image()
                            ->directory('mechanism-of-action/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Section 1 - IFN-γ driven Inflammation')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('section_1_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('section_1_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('section_1_content_en')
                            ->label('Content (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('section_1_content_zh')
                            ->label('Content (Chinese)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('section_1_image_en')
                            ->label('Image (English)')
                            ->image()
                            ->directory('mechanism-of-action/section1')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('section_1_image_zh')
                            ->label('Image (Chinese)')
                            ->image()
                            ->directory('mechanism-of-action/section1')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('section_1_caption_en')
                            ->label('Caption (English)')
                            ->maxLength(255),
                        TextInput::make('section_1_caption_zh')
                            ->label('Caption (Chinese)')
                            ->maxLength(255),
                    ]),
                ]),

            Section::make('Section 2 - JAK-STAT Pathway Role')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('section_2_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('section_2_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('section_2_content_en')
                            ->label('Content (English)')
                            ->required()
                            ->maxLength(3000)
                            ->rows(6),
                        Textarea::make('section_2_content_zh')
                            ->label('Content (Chinese)')
                            ->required()
                            ->maxLength(3000)
                            ->rows(6),
                    ]),
                ]),

            Section::make('Section 3 - JAK Inhibitor')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('section_3_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('section_3_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('section_3_content_en')
                            ->label('Content (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('section_3_content_zh')
                            ->label('Content (Chinese)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('section_3_image_en')
                            ->label('Image (English)')
                            ->image()
                            ->directory('mechanism-of-action/section3')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('section_3_image_zh')
                            ->label('Image (Chinese)')
                            ->image()
                            ->directory('mechanism-of-action/section3')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('section_3_caption_en')
                            ->label('Caption (English)')
                            ->maxLength(255),
                        TextInput::make('section_3_caption_zh')
                            ->label('Caption (Chinese)')
                            ->maxLength(255),
                    ]),
                ]),

            Section::make('Section 4 - Promising Treatment')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('section_4_title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('section_4_title_zh')
                            ->label('Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('section_4_content_en')
                            ->label('Content (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('section_4_content_zh')
                            ->label('Content (Chinese)')
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
                        ->directory('mechanism-of-action/og')
                        ->visibility('public'),
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
                    Grid::make(2)->schema([
                        Textarea::make('reference_4_en')
                            ->label('Reference 4 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('reference_4_zh')
                            ->label('Reference 4 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('reference_5_en')
                            ->label('Reference 5 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('reference_5_zh')
                            ->label('Reference 5 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('reference_6_en')
                            ->label('Reference 6 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('reference_6_zh')
                            ->label('Reference 6 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                ]),

            Section::make('Abbreviations')
                ->schema([
                    Grid::make(2)->schema([
                        Textarea::make('abbreviations_en')
                            ->label('Abbreviations (English)')
                            ->rows(3)
                            ->maxLength(1000),
                        Textarea::make('abbreviations_zh')
                            ->label('Abbreviations (Chinese)')
                            ->rows(3)
                            ->maxLength(1000),
                    ]),
                ]),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->hasPermission('manage-settings');
    }
}
