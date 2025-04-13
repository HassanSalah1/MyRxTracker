<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Actions\Action;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withCount('attendees')->with('attendees');

    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title_en')->required()->maxLength(255),
                TextInput::make('title_zh')->required()->maxLength(255),
                Forms\Components\RichEditor::make('description_en'),
                Forms\Components\RichEditor::make('description_zh'),
                FileUpload::make('image')->image()->directory('events'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_en')->limit(50)->searchable()->sortable(),
                TextColumn::make('title_zh')->limit(50),
                ImageColumn::make('image')->circular(),
                TextColumn::make('attendees_count')
                    ->counts('attendees') // counts relation
                    ->label('Attendees')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('View Attendees')
                    ->icon('heroicon-o-users')
                    ->modalHeading('Attendees')
                    ->modalSubmitAction(false) // disable submit button
                    ->modalCancelActionLabel('Close')
                    ->action(fn () => null) // no backend logic needed
                    ->modalContent(fn ($record) => view('filament.attendees-modal', [
                        'attendees' => $record->attendees,
                        'eventId' => $record->id,
                    ])),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
