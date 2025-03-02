<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Imports\DoctorImport;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class ListDoctors extends ListRecords
{
    protected static string $resource = DoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('import')
                ->label('Import Doctors')
                ->icon('heroicon-m-arrow-down-tray')
                ->color('warning')
                ->form([
                    FileUpload::make('file')
                        ->label('Excel File')
                        ->required()
                        ->directory('imports')
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                        ]),
                ])
                ->action(function (array $data) {
                    // Ensure the file is uploaded correctly
                    if (!isset($data['file'])) {
                        throw new \Exception('No file uploaded.');
                    }

                    // Use the temporary path without storing
                    //$filePath = $data['file']->getRealPath();
                    $filePath = storage_path('app/public/' . $data['file']);
                    //dd($filePath);
                    // Import using Laravel Excel
                    Excel::import(new DoctorImport, $filePath);
                    // Delete the file after import
                    unlink($filePath);
                    Notification::make()
                        ->title('Import Successful')
                        ->success()
                        ->body('Doctors have been imported successfully.')
                        ->send();
                })
        ];
    }

}
