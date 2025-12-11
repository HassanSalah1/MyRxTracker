<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'image' => url(Storage::url($event->image)),
            ];
        });


        return $this->successResponse(null,$events);
    }

    public function attending(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|exists:events,id',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $user = auth()->user();
        $event = $request->event_id;

        if ($user->attendingEvents()->where('event_id', $event)->exists()) {
            return $this->errorResponse(trans('messages.already_attending'), 422);
        }

        $user->attendingEvents()->attach($event);


        return $this->successResponse(trans('messages.attending'));
    }



}