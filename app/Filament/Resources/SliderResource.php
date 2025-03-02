<?php
namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Slider Image')
                    ->image()
                    ->columnSpanFull()
                    ->directory('sliders')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public'), // Ensure it's served correctly
            ])
            ->actions([
                Tables\Actions\EditAction::make() // Opens Edit in Modal
                ->modal(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
//            'create' => Pages\CreateSlider::route('/create'),
//            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
