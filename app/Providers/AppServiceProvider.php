<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Config::set('kecamatan', require config_path('kecamatan.php'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('admin', function (User $user) {
            return $user->admin;
        });

        Gate::define('n_admin', function (User $user) {
            return !$user->admin;
        });
    }
}
