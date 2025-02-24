<?php

namespace App\Filament\Resources;

use App\Enums\PacksStatus;
use App\Filament\Resources\StarterPackResource\Pages;
use App\Filament\Resources\StarterPackResource\RelationManagers;
use App\Models\StarterPack;
use App\Models\User;
use App\Services\FirebaseService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\Action;

class StarterPackResource extends Resource
{
    protected static ?string $model = StarterPack::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?int $navigationSort = 3;

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
                Forms\Components\Select::make('pack_id')
                    ->label('Pack Name')
                    ->required()
                    ->relationship('pack', 'name_en')
                    ->searchable()
                    ->reactive() // يجعل الحقل تفاعليًا
                    ->afterStateUpdated(function ($state, $livewire) {
                        $userId = $livewire->data['user_id'];
                        if ($userId) {
                            User::find($userId)->update(['pack_id' => $state]);
                        }
                    })
                    ->preload(),
                Forms\Components\Select::make('verification_status')
                    ->label('Status')
                    ->options(PacksStatus::class)
                    ->required(),
                Forms\Components\DatePicker::make('date_of_application')
                    ->required(),
                Forms\Components\TextInput::make('serial_no')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\FileUpload::make('certificate_path')

                ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Patient Name'),

                Tables\Columns\TextColumn::make('doctor.name_en')
                    ->label('Doctor Name'),
                Tables\Columns\TextColumn::make('pack.name_en')
                    ->label('Pack Name'),
                Tables\Columns\TextColumn::make('verification_status')
                    ->label('Status'),
//                SelectColumn::make('verification_status')
//                    ->label('Status')
//                    ->options(PacksStatus::class)
//                    ->sortable()
//                    ->afterStateUpdated(function ($record, $state) {
//
//                    }),
                Tables\Columns\TextColumn::make('date_of_application')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('serial_no')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('certificate_path')
//                    ->label('Certificate')
//                    ->formatStateUsing(function ($state) {
//                        return "Click Here"; // عرض اسم الملف فقط
//                    })
//                    ->url(function ($record) {
//                        return url('storage/' . $record->certificate_path); // رابط تنزيل الملف
//                    }, true) // true لفتح الرابط في علامة تبويب جديدة
//                    ->openUrlInNewTab(),
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
            'index' => Pages\ListStarterPacks::route('/'),
            'create' => Pages\CreateStarterPack::route('/create'),
            'edit' => Pages\EditStarterPack::route('/{record}/edit'),
        ];
    }
}
