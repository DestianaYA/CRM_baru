<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\TopUp;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 
class PesanController extends Controller
{
    public function forBalance($userId)
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
    public function tampilan()
    {
        $user = Auth::user();
        $balance = $this->forBalance($user->id);
        $balanceAmount =($balance);
        return view('client.pesan', ['balanceAmount' => $balanceAmount]);
    }
    public function show()
    {
        $user = Auth::user();
        $balance = $this->forBalance($user->id);
        $balanceAmount =($balance);
        return view('agent.pesan', ['balanceAmount' => $balanceAmount]);
    }
    }