<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\UserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PhotoTrackingController extends Controller
{
    public function index()
    {
        $photos = auth()->user()->photos;
        $data = [];
        foreach ($photos as $photo){
            $data[] = [
                'id' => $photo->id,
                'date' => $photo->created_at->format('d F Y h:i A'),
                'image' => url(Storage::url($photo->photo_path)),
            ];
        }
        return $this->successResponse(null, $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|file|mimes:jpg,png',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $user = auth()->user();


        $receiptPath = $request->file('photo')->store('user-photos', 'public');
        UserPhoto::create([
            'user_id' => $user->id,
            'photo_path' => $receiptPath,
        ]);
        return $this->successResponse(trans('messages.photo_added_successfully'));
    }


    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo_id' => 'required|exists:user_photos,id',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        UserPhoto::find($request->photo_id)->delete();
        return $this->successResponse(trans('messages.photo_deleted_successfully'));
    }

}