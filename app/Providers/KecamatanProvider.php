<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class KecamatanProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('kecamatan', function () {
            $apiUrl = 'http://www.emsifa.com/api-wilayah-indonesia/api/districts/3329.json'; // Ganti dengan URL API yang sesuai


            $client = new Client();
            $response = $client->get($apiUrl);

            // Mendapatkan data dari respons API dalam bentuk array
            $kecamatan = json_decode($response->getBody(), true);

            return $kecamatan;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
