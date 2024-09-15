<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WhatsappController extends Controller{
public function sendMessage($to, $message)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . config('services.whatsapp.api_key'),
    ])->post(config('services.whatsapp.api_url'), [
        'to' => $to,
        'message' => $message,
    ]);

    return $response->json();
}
}