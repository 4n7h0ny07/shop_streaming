<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SmsService;

class SmsController extends Controller
{
    //
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function sendSms(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
            'message' => 'required|string|max:160'
        ]);

        $this->smsService->sendSms($request->phone_number, $request->message);

        return response()->json(['success' => 'SMS enviado correctamente.']);
    }
}
