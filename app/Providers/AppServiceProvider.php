<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::share('balanceAmount', function () {
            if (Auth::check()) {
                return Auth::user()->balanceAmount;
            }
            return null;
        });
    }

    public function register()
    {
        //
    }
}

