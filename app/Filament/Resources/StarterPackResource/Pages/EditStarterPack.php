<?php

namespace App\Filament\Resources\StarterPackResource\Pages;

use App\Enums\NotificationStatus;
use App\Enums\PacksStatus;
use App\Filament\Resources\StarterPackResource;
use App\Notifications\VerificationApprovedNotification;
use App\Services\FirebaseService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditStarterPack extends EditRecord
{
    protected static string $resource = StarterPackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function afterSave(): void
    {
        $record = $this->record;
        if ($record->verification_status == PacksStatus::APPROVED->value) {
            //$firebaseService = new FirebaseService();
            // Fetch the user
//            $user = $record->user;
//            if ($user && $user->fcm_token) {
//                // Send Firebase Notification
//                $firebaseService->sendNotification(
//                    'Verification Approved',
//                    'Your verification status has been updated to OK!',
//                    $user->fcm_token,
//                    ['pack_id' => $record->id]
//                );
//            }
            $user = $record->user;
            if ($user) {
                $user->notify(new VerificationApprovedNotification(
                    'Verification Approved',
                    'Your verification status has been updated to OK!',
                    ['type' => NotificationStatus::HOME->value]
                ));
                }
        }
    }
}
