<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\TopUp;
use App\Models\Balance;
use App\Models\Kontent;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showBalance($userId)
    {
        $totals = DB::table('top_ups')
            ->select('user_id', DB::raw('SUM(amount) as total_amount'))
            ->where('user_id', $userId)
            ->groupBy('user_id')
            ->first();

        if (!$totals) {
            $total_amount = 0;
        } else {
            $total_amount = $totals->total_amount;
        }

        $balance = Balance::updateOrCreate(
            ['user_id' => $userId],
            ['amount' => $total_amount]
        );

        return $balance->amount;
    }
    public function awal()
    {
        $user = Auth::user();
        $balance = $this->showBalance($user->id);
        $balanceAmount = ($balance);
        $roleContent = Kontent::where('role', $user->role)->first(); // Mendapatkan data sesuai role user
        return view('client.dashboard', [
            'balanceAmount' => $balanceAmount,
            'roleContent' => $roleContent,

        ]);
    }
    public function mulai()
    {
        $user = Auth::user();
        $balance = $this->showBalance($user->id);
        $balanceAmount = ($balance);
        $roleContent = Kontent::where('role', $user->role)->first(); // Mendapatkan data sesuai role user
        return view('agent.dashboard', [
            'balanceAmount' => $balanceAmount,
            'roleContent' => $roleContent,

        ]);
    }
    public function agent()
    {
        $user = Auth::user();
        $balance = $this->showBalance($user->id);
        $balanceAmount = ($balance);
        $roleContent = Kontent::where('role', $user->role)->first(); // Mendapatkan data sesuai role user
        return view('agent.dashboard', [
            'balanceAmount' => $balanceAmount,
            'roleContent' => $roleContent,

        ]);
    }
}