<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\TopUp;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 
class OrdersController extends Controller
{
    public function toBalance($userId)
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
    public function create()
    {
        $user = Auth::user();
        $balance = $this->toBalance($user->id);

        // Flash a success message
        session()->flash('success', 'Top-up berhasil!');

        return view('client.transaksi', ['balanceAmount' => $balance]);
    }
    public function creates()
    {
        $user = Auth::user();
        $balance = $this->toBalance($user->id);

        // Flash a success message
        session()->flash('success', 'Top-up berhasil!');

        return view('agent.transaksi', ['balanceAmount' => $balance]);
    }
}