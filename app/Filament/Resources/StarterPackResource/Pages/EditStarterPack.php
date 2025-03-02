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
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
//        if ($record->verification_status == PacksStatus::APPROVED->value) {
//            $firebaseService = new FirebaseService();
//             //Fetch the user
//            $user = $record->user;
////            if ($user && $user->fcm_token) {
////                // Send Firebase Notification
////                $firebaseService->sendNotification(
////                    'Verification Approved',
////                    'Your verification status has been updated to OK!',
////                    $user->fcm_token,
////                    ['pack_id' => $record->id]
////                );
////            }
//            if (!$record->certificate_path){
//                $record->update([
//                    'certificate_path' => $this->generateQrcode($user->id)
//                ]);
//            }
//
//
////            $user = $record->user;
//            if ($user) {
//                $user->notify(new VerificationApprovedNotification(
//                    'Verification Approved',
//                    'Your verification status has been updated to OK!',
//                    ['type' => NotificationStatus::HOME->value]
//                ));
//                }
//        }
    }

    private function generateQrcode($user_id)
    {
        $url = url('profile/' .$user_id);
        // Generate the QR code
        $qrCode = QrCode::format('png')->size(300)->generate($url);

        // Save the QR code to the public disk
        $qrFileName = 'qrcodes/' . time() . '.png';

        Storage::disk('public')->put($qrFileName, $qrCode);

        return  $qrFileName;
        // Get the QR code URL
        //return url(Storage::url($qrFileName));
    }
}
