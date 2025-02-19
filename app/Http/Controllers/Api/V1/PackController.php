<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\PacksStatus;
use App\Models\OnTrackPack;
use App\Models\RedeemingPack;
use App\Models\StarterPack;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PackController extends Controller
{
    public function activePack()
    {
        $pack = auth()->user()->pack;
        $on_track = $pack->onTrackPacks
                    ->where('verification_status', PacksStatus::APPROVED)
                    ->where('used_for_redemption', false)->count();

        $data = [
          'name' => $pack->name,
          'image' => url(Storage::url($pack->image)),
          'on_track_count' => $on_track,
          'can_redeeming' => $on_track == 3

        ];
        return $this->successResponse(null, $data);
    }
    public function starterPack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'application_date' => 'required|date',
            'serial_no' => 'required|string|unique:starter_packs,serial_no,unique:redeeming_packs',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $user = auth()->user();
        StarterPack::create([
            'user_id' => $user->id,
            'doctor_id' => $request->doctor_id,
            'date_of_application' => $request->application_date,
            'serial_no' => $request->serial_no,
        ]);

        return $this->successResponse(trans('messages.starter_pack_success'));
    }

    public function onTrackPack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'application_date' => 'required|date',
            'next_consultation_date' => 'required|date',
            'receipt' => 'required|file|mimes:pdf,jpg,png',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $user = auth()->user();
        $onTrackRequests = StarterPack::where('user_id', $user->id)
            ->get();

        if ($onTrackRequests->count() < 1) {
            return $this->errorResponse(trans('messages.no_starter_pack'), 400);
        }
        $receiptPath = $request->file('receipt')->store('receipts');
        OnTrackPack::create([
            'user_id' => $user->id,
            'pack_id' => $user->pack_id,
            'doctor_id' => $request->doctor_id,
            'application_date' => $request->application_date,
            'next_consultation_date' => $request->next_consultation_date,
            'receipt_path' => $receiptPath,
        ]);


        return $this->successResponse(trans('messages.on_track_pack_success'));
    }

    public function redeemingPack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'application_date' => 'required|date',
            'serial_no' => 'required|string|unique:starter_packs,serial_no,unique:redeeming_packs',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $user = auth()->user();
        $onTrackRequests = OnTrackPack::where('user_id', $user->id)
            ->where('verification_status', PacksStatus::APPROVED)
            ->where('used_for_redemption', false)
            ->get();

        if ($onTrackRequests->count() < 3) {
            return $this->errorResponse(trans('messages.unused_message'), 400);
        }

        $usedApplicationIds = [];
        foreach ($onTrackRequests as $onTrackRequest) {
            $onTrackRequest->update(['used_for_redemption' => true]);
            $usedApplicationIds[] = $onTrackRequest->id;
        }

        RedeemingPack::create([
            'user_id' => $user->id,
            'pack_id' => $user->pack_id,
            'doctor_id' => $request->doctor_id,
            'redemption_date' => $request->application_date,
            'serial_number' => $request->serial_no,
            'used_applications' => json_encode($usedApplicationIds),
        ]);


        return $this->successResponse(trans('messages.redeeming_pack_success'));
    }


}