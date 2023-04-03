<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LibrariesIoService
{
    public function getPackage()
    {
        $url = 'https://libraries.io/api/platforms?api_key=becf21e3b26f49e963530ff2e26aa9e7';

        return Cache::remember($url, now()->addMinutes(60), function () use ($url) {
            $response = Http::get($url);

            return $response->json();
        });
    }
}

