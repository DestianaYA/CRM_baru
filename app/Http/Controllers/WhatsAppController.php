<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function send(Request $request)
    {
        $request->validate([
            'to' => 'required',
            'message' => 'required',
        ]);

        $this->twilio->sendWhatsAppMessage($request->to, $request->message);

        return response()->json(['status' => 'Message sent successfully']);
    }
}
