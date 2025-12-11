<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ProgramStatus;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    /**
     * Get user's program status and purchase details.
     */
    public function status(Request $request)
    {
        $user = $request->user();
        $purchase = $user->purchase;

        $data = [
            'program_status' => $user->program_status?->value ?? ProgramStatus::ELIGIBLE->value,
            'can_submit_purchase' => $user->program_status === ProgramStatus::ELIGIBLE,
            'can_redeem' => $purchase && $purchase->status === ProgramStatus::APPROVED,
            'purchase' => null,
        ];

        if ($purchase) {
            $data['purchase'] = [
                'id' => $purchase->id,
                'doctor_name' => $purchase->doctor_name,
                'serial_number' => $purchase->serial_number,
                'purchase_date' => $purchase->purchase_date ? $purchase->purchase_date->format('Y-m-d') : null,
                'receipt_url' => $purchase->receipt_path ? url(Storage::url($purchase->receipt_path)) : null,
                'status' => $purchase->status->value,
                'admin_notes' => $purchase->admin_notes,
                'approved_at' => $purchase->approved_at ? $purchase->approved_at->format('Y-m-d H:i:s') : null,
                'redemption_serial_number' => $purchase->redemption_serial_number,
                'redemption_doctor_name' => $purchase->redemption_doctor_name,
                'redemption_date' => $purchase->redemption_date ? $purchase->redemption_date->format('Y-m-d') : null,
                'redeemed_at' => $purchase->redeemed_at ? $purchase->redeemed_at->format('Y-m-d H:i:s') : null,
            ];
        }

        return $this->successResponse(null, $data);
    }

    /**
     * Submit purchase (receipt, serial, doctor, date).
     */
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_name' => 'required|string|max:255',
            'serial_number' => 'required|string|unique:purchases,serial_number',
            'purchase_date' => 'required|date',
            'receipt' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $user = $request->user();

        // Check if user is eligible
        if ($user->program_status !== ProgramStatus::ELIGIBLE) {
            return $this->errorResponse(trans('messages.purchase_already_submitted'), 422);
        }

        // Check if user already has a purchase
        if ($user->purchase) {
            return $this->errorResponse(trans('messages.purchase_already_exists'), 422);
        }

        $receiptPath = $request->file('receipt')->store('purchases', 'public');

        $purchase = Purchase::create([
            'user_id' => $user->id,
            'doctor_name' => $request->doctor_name,
            'serial_number' => $request->serial_number,
            'purchase_date' => $request->purchase_date,
            'receipt_path' => $receiptPath,
            'status' => ProgramStatus::PENDING_APPROVAL,
        ]);

        $user->update([
            'program_status' => ProgramStatus::PENDING_APPROVAL,
        ]);

        return $this->successResponse(trans('messages.purchase_submitted_successfully'), [
            'purchase_id' => $purchase->id,
            'status' => $purchase->status->value,
        ]);
    }

    /**
     * Redeem free tube (serial, doctor, date).
     */
    public function redeem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'redemption_serial_number' => 'required|string',
            'redemption_doctor_name' => 'required|string|max:255',
            'redemption_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $user = $request->user();
        $purchase = $user->purchase;

        if (!$purchase) {
            return $this->errorResponse(trans('messages.no_purchase_found'), 404);
        }

        if ($purchase->status !== ProgramStatus::APPROVED) {
            return $this->errorResponse(trans('messages.purchase_not_approved'), 422);
        }

        if ($purchase->status === ProgramStatus::COMPLETED) {
            return $this->errorResponse(trans('messages.purchase_already_redeemed'), 422);
        }

        $purchase->update([
            'redemption_serial_number' => $request->redemption_serial_number,
            'redemption_doctor_name' => $request->redemption_doctor_name,
            'redemption_date' => $request->redemption_date,
            'status' => ProgramStatus::COMPLETED,
            'redeemed_at' => now(),
        ]);

        $user->update([
            'program_status' => ProgramStatus::COMPLETED,
            'status' => \App\Enums\UserStatus::COMPLETED,
        ]);

        return $this->successResponse(trans('messages.redemption_successful'), [
            'purchase_id' => $purchase->id,
            'status' => $purchase->status->value,
        ]);
    }
}
