<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('access-admin', function (Admin $user) {
            return $user->admin;
        });
    }
}
