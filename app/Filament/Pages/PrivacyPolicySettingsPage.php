<?php

namespace App\Filament\Pages;

use App\Settings\PrivacyPolicySettings;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class PrivacyPolicySettingsPage extends SettingsPage
{
    protected static string $settings = PrivacyPolicySettings::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $navigationLabel = 'Privacy Policy Page';
    protected static ?string $title = 'Privacy Policy Page Settings';

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Titles')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('title_en')->label('Title (English)')->required()->maxLength(255),
                        TextInput::make('title_zh')->label('Title (Chinese)')->required()->maxLength(255),
                    ]),
                ]),
            Section::make('Content')
                ->schema([
                    Grid::make(2)->schema([
                        RichEditor::make('content_en')->label('Content (English)')->fileAttachmentsDirectory('privacy')->columnSpanFull(),
                        RichEditor::make('content_zh')->label('Content (Chinese)')->fileAttachmentsDirectory('privacy')->columnSpanFull(),
                    ]),
                ]),
        ]);
    }
}


