<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogoutIfSessionExpired
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && session('logout_all_users')) {
            Auth::logout();
            return redirect('/login')->withErrors('You have been logged out.');
        }

        return $next($request);
    }
}
