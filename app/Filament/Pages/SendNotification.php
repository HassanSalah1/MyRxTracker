<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Services\NotificationService;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Pages\Page;

class SendNotification extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    protected static string $view = 'filament.pages.send-notification';

    protected static ?string $navigationLabel = 'Send Notification';

    protected static ?string $navigationGroup = 'Notifications';

    protected static ?int $navigationSort = 10;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Notification Title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('body')
                    ->label('Notification Body')
                    ->required()
                    ->rows(4),
                Forms\Components\Select::make('target')
                    ->label('Target Audience')
                    ->options([
                        'all' => 'All Users',
                        'specific' => 'Specific Users',
                    ])
                    ->required()
                    ->default('all')
                    ->live(),
                Forms\Components\Select::make('user_ids')
                    ->label('Select Users')
                    ->multiple()
                    ->options(User::whereNotNull('fcm_token')->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->visible(fn ($get) => $get('target') === 'specific'),
                Forms\Components\KeyValue::make('data')
                    ->label('Additional Data (Optional)')
                    ->keyLabel('Key')
                    ->valueLabel('Value')
                    ->helperText('Add custom data for deep linking (e.g., type: event, id: 1)'),
            ])
            ->statePath('data');
    }

    public function send(): void
    {
        $data = $this->form->getState();
        $notificationService = app(NotificationService::class);

        try {
            $result = match ($data['target']) {
                'all' => $notificationService->sendToAllUsers(
                    $data['title'],
                    $data['body'],
                    $data['data'] ?? []
                ),
                'specific' => $notificationService->sendToUsers(
                    $data['user_ids'],
                    $data['title'],
                    $data['body'],
                    $data['data'] ?? []
                ),
            };

            FilamentNotification::make()
                ->title('Notification Sent')
                ->success()
                ->body("Sent to {$result['sent']} users. Failed: {$result['failed']}")
                ->send();

            $this->form->fill();
        } catch (\Exception $e) {
            FilamentNotification::make()
                ->title('Error')
                ->danger()
                ->body($e->getMessage())
                ->send();
        }
    }
}
