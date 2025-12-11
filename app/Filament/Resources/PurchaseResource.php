<?php

namespace App\Filament\Resources;

use App\Enums\ProgramStatus;
use App\Filament\Resources\PurchaseResource\Pages;
use App\Models\Purchase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class PurchaseResource extends Resource
{
    protected static ?string $model = Purchase::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Purchases';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('doctor_name')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('serial_number')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\DatePicker::make('purchase_date')
                    ->required()
                    ->disabled(),
                Forms\Components\Placeholder::make('receipt_path')
                    ->label('Receipt')
                    ->content(fn ($record) => $record && $record->receipt_path 
                        ? new HtmlString('<a href="' . url(Storage::url($record->receipt_path)) . '" target="_blank">View Receipt</a>')
                        : 'No receipt'),
                Forms\Components\Select::make('status')
                    ->options([
                        ProgramStatus::PENDING_APPROVAL->value => 'Pending Approval',
                        ProgramStatus::APPROVED->value => 'Approved',
                        ProgramStatus::REJECTED->value => 'Rejected',
                        ProgramStatus::COMPLETED->value => 'Completed',
                    ])
                    ->required()
                    ->disabled(fn ($record) => $record && $record->status === ProgramStatus::COMPLETED),
                Forms\Components\Textarea::make('admin_notes')
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\Section::make('Redemption Details')
                    ->schema([
                        Forms\Components\TextInput::make('redemption_serial_number')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('redemption_doctor_name')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('redemption_date'),
                    ])
                    ->visible(fn ($record) => $record && $record->status === ProgramStatus::APPROVED)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('doctor_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('purchase_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => ProgramStatus::PENDING_APPROVAL->value,
                        'success' => ProgramStatus::APPROVED->value,
                        'danger' => ProgramStatus::REJECTED->value,
                        'info' => ProgramStatus::COMPLETED->value,
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        ProgramStatus::PENDING_APPROVAL->value => 'Pending Approval',
                        ProgramStatus::APPROVED->value => 'Approved',
                        ProgramStatus::REJECTED->value => 'Rejected',
                        ProgramStatus::COMPLETED->value => 'Completed',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Purchase $record) {
                        $record->update([
                            'status' => ProgramStatus::APPROVED,
                            'approved_at' => now(),
                            'approved_by' => auth()->id(),
                        ]);
                        $record->user->update([
                            'program_status' => ProgramStatus::APPROVED,
                        ]);
                    })
                    ->visible(fn (Purchase $record) => $record->status === ProgramStatus::PENDING_APPROVAL),
                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->form([
                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Rejection Reason')
                            ->required(),
                    ])
                    ->action(function (Purchase $record, array $data) {
                        $record->update([
                            'status' => ProgramStatus::REJECTED,
                            'admin_notes' => $data['admin_notes'],
                        ]);
                        $record->user->update([
                            'program_status' => ProgramStatus::ELIGIBLE,
                        ]);
                    })
                    ->visible(fn (Purchase $record) => $record->status === ProgramStatus::PENDING_APPROVAL),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchases::route('/'),
            'view' => Pages\ViewPurchase::route('/{record}'),
            'edit' => Pages\EditPurchase::route('/{record}/edit'),
        ];
    }
}
