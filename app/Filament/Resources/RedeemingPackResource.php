<?php

namespace App\Filament\Resources;

use App\Enums\RedeemingPacksStatus;
use App\Filament\Resources\RedeemingPackResource\Pages;
use App\Filament\Resources\RedeemingPackResource\RelationManagers;
use App\Models\RedeemingPack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RedeemingPackResource extends Resource
{
    protected static ?string $model = RedeemingPack::class;
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    public static function canCreate(): bool
    {
        return  false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Patient Name')
                    ->relationship('user', 'name') // 'patient' is the relationship method, 'name' is the column to display
                    ->searchable() // Optional: Allows searching
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('doctor_id')
                    ->label('Doctor Name')
                    ->required()
                    ->relationship('doctor', 'name_en') // 'doctor' is the relationship method, 'name' is the column to display
                    ->searchable() // Optional: Allows searching
                    ->preload(), // Optional: Preloads options
                Forms\Components\DatePicker::make('next_consultation_date')
                    ->required(),
                Forms\Components\DatePicker::make('redemption_date'),
                Forms\Components\TextInput::make('serial_number')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(RedeemingPacksStatus::class)
                    ->required(),
                //Forms\Components\FileUpload::make('certificate_path')
                    //->required()
//                Forms\Components\TextInput::make('used_applications')
//                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Patient Name'),

                Tables\Columns\TextColumn::make('doctor_name')
                    ->label('Doctor Name'),
                Tables\Columns\TextColumn::make('next_consultation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('redemption_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('certificate_path')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRedeemingPacks::route('/'),
            'create' => Pages\CreateRedeemingPack::route('/create'),
            'edit' => Pages\EditRedeemingPack::route('/{record}/edit'),
        ];
    }
}
