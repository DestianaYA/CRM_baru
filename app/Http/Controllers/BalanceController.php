<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Matcher\Closure;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * Display the balance amount for the authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function showBalance()
    {
        $user = Auth::user();
        
        if ($user) {
            \Log::info('User Role: ' . implode(', ', $user->getRoleNames()->toArray()));
            \Log::info('Balance Amount: ' . $user->balanceAmount);
            $balanceAmount = $user->balanceAmount;
            return view('balance.show', compact('balanceAmount'));
        }

        return redirect()->route('login');
    }
    public function show($id)
{
    $user = User::find($id);
    $balance = $user->balance; // Pastikan relasi sudah benar
    return view('user.show', compact('balance'));
}
}
