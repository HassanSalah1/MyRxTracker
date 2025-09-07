<?php

namespace App\Filament\Pages;

use App\Settings\SettingExpectationsSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class SettingExpectationsSettingsPage extends SettingsPage
{
    protected static string $settings = SettingExpectationsSettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $navigationLabel = 'Setting Expectations Settings';
    protected static ?string $title = 'Setting Expectations Page Settings';

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
                            ->directory('setting-expectations/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_image_zh')
                            ->label('Header Image (Chinese)')
                            ->image()
                            ->directory('setting-expectations/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('header_secondary_image_en')
                            ->label('Secondary Image (English)')
                            ->image()
                            ->directory('setting-expectations/header')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('header_secondary_image_zh')
                            ->label('Secondary Image (Chinese)')
                            ->image()
                            ->directory('setting-expectations/header')
                            ->visibility('public')
                            ->required(),
                    ]),
                ]),

            Section::make('Checklist Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('checklist_title_en')
                            ->label('Checklist Title (English)')
                            ->required()
                            ->maxLength(500),
                        TextInput::make('checklist_title_zh')
                            ->label('Checklist Title (Chinese)')
                            ->required()
                            ->maxLength(500),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('checklist_item_1_en')
                            ->label('Checklist Item 1 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('checklist_item_1_zh')
                            ->label('Checklist Item 1 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('checklist_item_2_en')
                            ->label('Checklist Item 2 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('checklist_item_2_zh')
                            ->label('Checklist Item 2 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('checklist_item_3_en')
                            ->label('Checklist Item 3 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('checklist_item_3_zh')
                            ->label('Checklist Item 3 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('checklist_item_4_en')
                            ->label('Checklist Item 4 (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('checklist_item_4_zh')
                            ->label('Checklist Item 4 (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                ]),

            Section::make('Repigmentation Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('repigmentation_title_en')
                            ->label('Repigmentation Title (English)')
                            ->required()
                            ->maxLength(500),
                        TextInput::make('repigmentation_title_zh')
                            ->label('Repigmentation Title (Chinese)')
                            ->required()
                            ->maxLength(500),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('repigment_fast_title_en')
                            ->label('Repigment Fast Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('repigment_fast_title_zh')
                            ->label('Repigment Fast Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('repigment_fast_description_en')
                            ->label('Repigment Fast Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('repigment_fast_description_zh')
                            ->label('Repigment Fast Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('repigment_slow_title_en')
                            ->label('Repigment Slow Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('repigment_slow_title_zh')
                            ->label('Repigment Slow Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('repigment_slow_description_en')
                            ->label('Repigment Slow Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('repigment_slow_description_zh')
                            ->label('Repigment Slow Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('repigment_none_title_en')
                            ->label('Repigment None Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('repigment_none_title_zh')
                            ->label('Repigment None Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('repigment_none_description_en')
                            ->label('Repigment None Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('repigment_none_description_zh')
                            ->label('Repigment None Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                ]),

            Section::make('Patterns Section')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('patterns_title_en')
                            ->label('Patterns Title (English)')
                            ->required()
                            ->maxLength(500),
                        TextInput::make('patterns_title_zh')
                            ->label('Patterns Title (Chinese)')
                            ->required()
                            ->maxLength(500),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('perifollicular_title_en')
                            ->label('Perifollicular Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('perifollicular_title_zh')
                            ->label('Perifollicular Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('perifollicular_description_en')
                            ->label('Perifollicular Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('perifollicular_description_zh')
                            ->label('Perifollicular Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('perifollicular_image_en')
                            ->label('Perifollicular Image (English)')
                            ->image()
                            ->directory('setting-expectations/patterns')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('perifollicular_image_zh')
                            ->label('Perifollicular Image (Chinese)')
                            ->image()
                            ->directory('setting-expectations/patterns')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('marginal_title_en')
                            ->label('Marginal Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('marginal_title_zh')
                            ->label('Marginal Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('marginal_description_en')
                            ->label('Marginal Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('marginal_description_zh')
                            ->label('Marginal Description (Chinese)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ]),
                    Grid::make(2)->schema([
                        FileUpload::make('marginal_image_en')
                            ->label('Marginal Image (English)')
                            ->image()
                            ->directory('setting-expectations/patterns')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('marginal_image_zh')
                            ->label('Marginal Image (Chinese)')
                            ->image()
                            ->directory('setting-expectations/patterns')
                            ->visibility('public')
                            ->required(),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('combined_title_en')
                            ->label('Combined Title (English)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('combined_title_zh')
                            ->label('Combined Title (Chinese)')
                            ->required()
                            ->maxLength(255),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('combined_description_en')
                            ->label('Combined Description (English)')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                        Textarea::make('combined_description_zh')
                            ->label('Combined Description (Chinese)')
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
                    Grid::make(2)->schema([
                        Textarea::make('reference_3_en')
                            ->label('Reference 3 (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('reference_3_zh')
                            ->label('Reference 3 (Chinese)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('reference_4_en')
                            ->label('Reference 4 (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('reference_4_zh')
                            ->label('Reference 4 (Chinese)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                    ]),
                    Grid::make(2)->schema([
                        Textarea::make('reference_5_en')
                            ->label('Reference 5 (English)')
                            ->required()
                            ->maxLength(2000)
                            ->rows(4),
                        Textarea::make('reference_5_zh')
                            ->label('Reference 5 (Chinese)')
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
                        ->directory('setting-expectations/og')
                        ->visibility('public')
                        ->required(),
                ]),
        ];
    }
}
