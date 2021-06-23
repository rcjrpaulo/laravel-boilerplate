<?php

namespace App\Services\Exceptions;

use Illuminate\Support\Facades\Http;

class StoreExceptionsService
{
    public function run($data)
    {
        if (empty(env('BOOTBOX_URL_API')) || empty(env('BOOTBOX_TOKEN_API'))) {
            return null;
        }

        return Http::withHeaders(['accessToken' => env('BOOTBOX_TOKEN_API')])
            ->asJson()
            ->post(env('BOOTBOX_URL_API') . '/exceptions', $data);
    }
}
