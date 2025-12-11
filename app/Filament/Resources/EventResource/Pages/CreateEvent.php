<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Store send_notification in request for observer
        if (isset($data['send_notification'])) {
            request()->merge(['send_notification' => $data['send_notification']]);
            unset($data['send_notification']); // Remove from data as it's not a model field
        }

        return $data;
    }
}
