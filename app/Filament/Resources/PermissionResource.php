<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use App\Models\Permission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';
    protected static ?string $navigationGroup = 'Access Control';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Permission Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Use kebab-case (e.g., manage-users)'),
                        TextInput::make('display_name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Human readable name'),
                        Select::make('module')
                            ->options([
                                'users' => 'Users',
                                'doctors' => 'Doctors',
                                'packs' => 'Packs',
                                'events' => 'Events',
                                'pharmacies' => 'Pharmacies',
                                'pages' => 'Pages',
                                'sliders' => 'Sliders',
                                'admin' => 'Admin',
                                'dashboard' => 'Dashboard',
                                'settings' => 'Settings',
                            ])
                            ->searchable()
                            ->nullable(),
                        Textarea::make('description')
                            ->columnSpanFull(),
                        TextInput::make('guard_name')
                            ->default('web')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('display_name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('module')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'users' => 'success',
                        'doctors' => 'warning',
                        'packs' => 'info',
                        'admin' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                BadgeColumn::make('roles_count')
                    ->counts('roles')
                    ->label('Roles')
                    ->color('primary'),
                TextColumn::make('guard_name')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('module')
                    ->options([
                        'users' => 'Users',
                        'doctors' => 'Doctors',
                        'packs' => 'Packs',
                        'events' => 'Events',
                        'pharmacies' => 'Pharmacies',
                        'pages' => 'Pages',
                        'sliders' => 'Sliders',
                        'admin' => 'Admin',
                        'dashboard' => 'Dashboard',
                        'settings' => 'Settings',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Permission $record) {
                        // Prevent deletion if permission is assigned to roles
                        if ($record->roles()->count() > 0) {
                            throw new \Exception('Cannot delete permission that is assigned to roles.');
                        }
                    }),
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
            'index' => Pages\ListPermissions::route('/'),
            'create' => Pages\CreatePermission::route('/create'),
            'view' => Pages\ViewPermission::route('/{record}'),
            'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->hasPermission('manage-permissions');
    }
} 