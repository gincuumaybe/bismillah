<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class WaNotif
{
    public static function send($phone, $message)
    {
        $apiKey = env('WABLAS_API_KEY');
        $url = 'https://console.wablas.com/api/v2/send-message';

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
        ])->post($url, [
            'phone' => $phone,
            'message' => $message,
        ]);

        return $response->json();
    }
}
