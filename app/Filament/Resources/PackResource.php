<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackResource\Pages;
use App\Filament\Resources\PackResource\RelationManagers;
use App\Models\Pack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PackResource extends Resource
{
    protected static ?string $model = Pack::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Pack Information')
                    ->schema([
                        TextInput::make('name_en')
                            ->label('Name (English)')
                            ->required(),
                        TextInput::make('name_zh')
                            ->label('Name (Chinese)')
                            ->required(),
                        Textarea::make('description_en')
                            ->label('Description (English)')
                            ->nullable(),
                        Textarea::make('description_zh')
                            ->label('Description (Chinese)')
                            ->nullable(),
                        FileUpload::make('image')
                            ->label('Image')
                            ->directory('packs')
                            ->nullable(),
                    ])->columns(2),

                Section::make('Pack Details')
                    ->schema([
                        TextInput::make('number_of_purchases')
                            ->label('Number of Purchases')
                            ->numeric()
                            ->default(0),
                        TextInput::make('number_of_free')
                            ->label('Number of Free')
                            ->numeric()
                            ->default(0),
                        DatePicker::make('from_date')
                            ->label('From Date')
                            ->required(),
                        DatePicker::make('to_date')
                            ->label('To Date')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name_en')->label('Name (English)')->sortable()->searchable(),
                TextColumn::make('name_zh')->label('Name (Chinese)')->sortable()->searchable(),
                ImageColumn::make('image')->label('Image')->rounded(),
                TextColumn::make('number_of_purchases')->label('Purchases')->sortable(),
                TextColumn::make('number_of_free')->label('Free')->sortable(),
                TextColumn::make('from_date')->label('From Date')->date(),
                TextColumn::make('to_date')->label('To Date')->date(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPacks::route('/'),
            'create' => Pages\CreatePack::route('/create'),
            'edit' => Pages\EditPack::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->hasPermission('view-packs');
    }
}
