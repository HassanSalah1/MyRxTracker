<?php

namespace App\Http\Controllers\Api\V1;

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


class PackController extends Controller
{
    public function history()
    {
        $userId = auth()->id();

        $starterPacks = StarterPack::where('user_id', $userId)->get()->map(function ($pack) {
            return [
                'type' => 'starter_pack',
                'id' => $pack->id,
                'title' => $pack->pack?->name,
                'created_at' => $pack->created_at->format('d F Y'),
                'status' => $pack->verification_status,
                'doctor_name' => $pack->doctor_name,
            ];
        });

        $onTrackPacks = OnTrackPack::where('user_id', $userId)->get()->map(function ($pack) {
            return [
                'type' => 'on_track_pack',
                'id' => $pack->id,
                'title' => $pack->pack?->name,
                'created_at' => $pack->created_at->format('d F Y'),
                'status' => $pack->verification_status,
                'doctor_name' => $pack->doctor_name,
            ];
        });

        $redeemingPacks = RedeemingPack::where('user_id', $userId)->get()->map(function ($pack) {
            return [
                'type' => 'redeeming_pack',
                'id' => $pack->id,
                'title' => $pack->pack?->name,
                'created_at' => $pack->created_at->format('d F Y'),
                'status' => $pack->status,
                'doctor_name' => $pack->doctor_name,
            ];
        });

        $history = collect()
            ->merge($starterPacks)
            ->merge($onTrackPacks)
            ->merge($redeemingPacks)
            ->sortByDesc('created_at')
            ->values(); // reset indexes

        return $this->successResponse(null, $history);
    }

    public function historyDetails($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:starter_pack,on_track_pack,redeeming_pack',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        // based on type $request->type starter_pack or on_track_pack or redeeming_pack get date from model
        $pack = null;

        if ($request->type === 'starter_pack') {
            $pack = StarterPack::find($id);
        } elseif ($request->type === 'on_track_pack') {
            $pack = OnTrackPack::find($id);
        } elseif ($request->type === 'redeeming_pack') {
            $pack = RedeemingPack::find($id);
        }

        if (!$pack) {
            return $this->errorResponse(trans('messages.pack_not_found'), 404);
        }

        return $this->successResponse(null, [
            'type' => $request->type,
            'id' => $pack->id,
            'created_at' => $pack->created_at->format('d F Y'),
            'status' => $pack->verification_status ?? $pack->status,
            'doctor_name' => $pack->doctor_name,
        ]);

    }
    public function activePack()
    {
        $user = auth()->user();
        $pack = $user->pack;
        if (!$pack){
            return $this->errorResponse(trans('messages.no_starter_pack'),422 );
        }
        $on_track = $pack->onTrackPacks
                    ->where('verification_status', PacksStatus::APPROVED)
                    ->where('used_for_redemption', false)
                    ->count();

        $data = [
          'name' => $pack?->name,
          'image' => url(Storage::url($pack->image)),
          'on_track_count' => $on_track,
          'can_redeeming' => (bool) $user->redeemingPacks?->where('status', RedeemingPacksStatus::READY)->count()

        ];
        return $this->successResponse(null, $data);
    }
    public function starterPack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'doctor_id' => 'required|exists:doctors,id',
            'doctor_name' => 'required',
            'application_date' => 'required|date',
            'serial_no' => 'required|string|unique:starter_packs,serial_no,unique:redeeming_packs',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $user = auth()->user();
           $pack_id = Pack::first()?->id ?? 1;
        StarterPack::create([
            'user_id' => $user->id,
            'doctor_name' => $request->doctor_name,
            //'doctor_id' => $request->doctor_id,
            'date_of_application' => $request->application_date,
            'serial_no' => $request->serial_no,
            'verification_status' => PacksStatus::APPROVED,
            'certificate_path' => $this->generateQrcode($user->id),
            'pack_id' => $pack_id
        ]);
        $user->update([
           'pack_id' =>$pack_id,
        ]);
        return $this->successResponse(trans('messages.starter_pack_success'));
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
    public function onTrackPack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'doctor_id' => 'required|exists:doctors,id',
            'doctor_name' => 'required',
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
            return $this->errorResponse(trans('messages.no_starter_pack'), 422);
        }
        $receiptPath = $request->file('receipt')->store('receipts', 'public');
        OnTrackPack::create([
            'user_id' => $user->id,
            'pack_id' => $user->pack_id,
            'doctor_name' => $request->doctor_name,
            //'doctor_id' => $request->doctor_id,
            'application_date' => $request->application_date,
            'next_consultation_date' => $request->next_consultation_date,
            'receipt_path' => $receiptPath,
        ]);


        return $this->successResponse(trans('messages.on_track_pack_success'));
    }

    public function redeemingPack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'doctor_id' => 'required|exists:doctors,id',
            'doctor_name' => 'required',
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
            return $this->errorResponse(trans('messages.unused_message'), 422);
        }

        $usedApplicationIds = [];
        foreach ($onTrackRequests as $onTrackRequest) {
            $onTrackRequest->update(['used_for_redemption' => true]);
            $usedApplicationIds[] = $onTrackRequest->id;
        }

        RedeemingPack::create([
            'user_id' => $user->id,
            'pack_id' => $user->pack_id,
            'doctor_name' => $request->doctor_name,
            //'doctor_id' => $request->doctor_id,
            'redemption_date' => $request->application_date,
            'serial_number' => $request->serial_no,
            'used_applications' => json_encode($usedApplicationIds),
        ]);


        return $this->successResponse(trans('messages.redeeming_pack_success'));
    }
    public function requestRedeemingPack(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'doctor_id' => 'required|exists:doctors,id',
            'doctor_name' => 'required',
            'next_consultation_date' => 'required|date',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $user = auth()->user();

        RedeemingPack::create([
            'user_id' => $user->id,
            'pack_id' => $user->pack_id,
            'doctor_name' => $request->doctor_name,
            //'doctor_id' => $request->doctor_id,
            'next_consultation_date' => $request->next_consultation_date,

        ]);


        return $this->successResponse(trans('messages.request_redeeming_pack_success'));
    }


}