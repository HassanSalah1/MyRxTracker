<?php

namespace App\Http\Controllers;

use App\Enums\RedeemingPacksStatus;
use App\Http\Controllers\Controller;
use App\Models\Pack;
use Illuminate\Http\Request;
use App\Enums\PacksStatus;
use App\Models\OnTrackPack;
use App\Models\RedeemingPack;
use App\Models\StarterPack;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Models\Event;
use Illuminate\Support\Facades\Response;

class EventController extends Controller
{

    public function exportAttending(Event $event)
    {
        $csv = $event->attendees->map(fn ($user) => [
            'Name' => $user->name,
            'Mobile' => $user->mobile,
        ]);

        $filename = 'attendees_event_' . $event->id . '.csv';

        $content = collect([
            ['Name', 'Mobile'],
            ...$csv->toArray(),
        ])->map(fn ($row) => implode(',', $row))->implode("\n");

        return Response::make($content)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename={$filename}");
    }



}