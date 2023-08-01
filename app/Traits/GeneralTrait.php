<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait GeneralTrait
{
    public function sendSms($receptor, $template, $token1, $token2 = null, $token3 = null)
    {
        $api = env('KAVEH_NEGAR_APIKEY');
        $url = "https://api.kavenegar.com/v1/{$api}/verify/lookup.json";
        $token1 = explode(" ",$token1);
        $token1_1 = $token1[0] ?? '';
        $token1_2 = $token1[1] ?? '';
        $token1_3 = $token1[2] ?? '';
        $params = [
            'receptor' => $receptor,
            'token' => $token1_1,
            'template' => $template,
        ];

        $params['token2'] = !is_null($token2) ? $token2 : $token1_2;

        $params['token3'] = !is_null($token3) ? $token3 : $token1_3;

        $json = Http::get($url, $params);

        $response = json_decode($json);
        $response = collect($response)->toArray();
        $response = collect($response['return'])->toArray();

        if ($response['status'] != 200)
            Log::info('send sms failed: ', ['status: ' => $response['status'], 'message: ' => $response['message']]);
    }
}
