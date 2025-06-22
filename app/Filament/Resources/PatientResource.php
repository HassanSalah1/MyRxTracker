<?php

namespace App\Filament\Resources;

use App\Enums\Roles;
use App\Enums\UserStatus;
use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $label = "Patients";
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', Roles::USER);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
//                TextInput::make('email')->email()->required(),
                TextInput::make('mobile')->required()->unique(ignoreRecord: true),
                TextInput::make('password')->password(),
//                Select::make('role')
//                    ->options(Roles::class)
//                    ->required(),
                Select::make('status')
                    ->options(UserStatus::class)
                    ->required(),
                // FileUpload::make('image')
                //     ->image()
                //     ->directory('users')
                //     ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
//                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('mobile')->sortable()->searchable(),
                TextColumn::make('identity_number')->sortable()->searchable(),
                SelectColumn::make('status')
                    ->options(UserStatus::class)
                    ->sortable()
                    ->searchable()
                    ->width('80px'),
                TextColumn::make('created_at')
                    ->label('Sign Up Date')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->searchable(),
//                ImageColumn::make('image')->rounded(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Export Patients')
                    ->color('success')
                    ->exports([
                        ExcelExport::make('Excel')
                            ->fromTable()
                            ->withFilename(fn () => 'patients-' . date('Y-m-d'))
                            ->withWriterType(\Maatwebsite\Excel\Excel::XLSX),
                        ExcelExport::make('csv')
                            ->fromTable()
                            ->withFilename(fn () => 'patients-' . date('Y-m-d'))
                            ->withWriterType(\Maatwebsite\Excel\Excel::CSV),
                    ]),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
