<?php

namespace App\Filament\Resources;

use App\Enums\PacksStatus;
use App\Filament\Resources\OnTrackPackResource\Pages;
use App\Filament\Resources\OnTrackPackResource\RelationManagers;
use App\Models\OnTrackPack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\Action;


class OnTrackPackResource extends Resource
{
    protected static ?string $model = OnTrackPack::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?int $navigationSort = 4;
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
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('doctor_id')
                    ->label('Doctor Name')
                    ->required()
                    ->relationship('doctor', 'name_en')
                    ->searchable()
                    ->preload(),
                Forms\Components\DatePicker::make('application_date')
                    ->required(),
                Forms\Components\DatePicker::make('next_consultation_date')
                    ->required(),
                Forms\Components\FileUpload::make('receipt_path')
                    ->disk('public') // Store in the public disk
                    ->directory('receipts'),

                Forms\Components\Select::make('verification_status')
                    ->label('Status')
                    ->options(PacksStatus::class)
                    ->required(),
//                Forms\Components\Toggle::make('used_for_redemption')
//                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Patient Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('doctor_name')
                    ->label('Doctor Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('application_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('next_consultation_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('verification_status'),
                Tables\Columns\IconColumn::make('used_for_redemption')
                    ->boolean(),

//                Tables\Columns\TextColumn::make('receipt_path'),
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
                Action::make('view_receipt')
                    ->label('View Receipt')
                    ->icon('heroicon-m-document-text')
                    ->color('secondary')
                    ->modalHeading('Receipt Preview') // Title of the modal
                    ->modalSubheading('This is the uploaded receipt.')
                    ->modalContent(fn ($record) => view('filament.receipt-modal', [
                        'receiptUrl' => $record->receipt_path
                            ? Storage::disk('public')->url($record->receipt_path)
                            : null,
                    ]))
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false)
                    ->modalCloseButton()
                    ->visible(fn ($record) => filled($record->receipt_path)),
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
            'index' => Pages\ListOnTrackPacks::route('/'),
            'create' => Pages\CreateOnTrackPack::route('/create'),
            'edit' => Pages\EditOnTrackPack::route('/{record}/edit'),
        ];
    }
}
