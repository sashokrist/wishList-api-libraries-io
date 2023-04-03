<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LibrariesIoService
{
    public function getPackage($name)
    {
        $url = 'https://libraries.io/api/pypi/' . $name;

        return Cache::remember($url, now()->addMinutes(60), function () use ($url) {
            $response = Http::get($url);

            return $response->json();
        });
    }
}

