<?php

namespace App\Providers;

use App\Models\BukaFitur;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class BukaFiturProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton('bukaFitur', function () {

            $buka = BukaFitur::where('halaman', 1)->first();

            if ($buka->dari <= date('Y-m-d') && $buka->sampai >= date('Y-m-d')) {
                return view('bukaFitur.halamanTutup');
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
