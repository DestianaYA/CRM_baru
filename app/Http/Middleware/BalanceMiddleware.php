<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BalanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $rolesAllowed = ['agent', 'client']; // Peran yang diizinkan

            if (in_array($user->role, $rolesAllowed)) {
                // Misalkan $balanceAmount didapat dari relasi atau metode pada model User
                $balanceAmount = $user->balanceAmount; // Sesuaikan dengan kebutuhan
                view()->share('balanceAmount', $balanceAmount);
            }
        }

        return $next($request);
    }
}
