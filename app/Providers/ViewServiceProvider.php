<?php
namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $balanceAmount = $user->balanceAmount;
                $view->with('balanceAmount', $balanceAmount);
            }
        });
    }

    public function register()
    {
        //
    }
}

