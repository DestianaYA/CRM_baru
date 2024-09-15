<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TopUp;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BroadcastController extends Controller
{
    public function realtime()
{
    $user = Auth::user();
    $balanceAmount = $this->getBalance($user->id);

    // Debug user roles
    Log::info('User:', ['user' => $user]);
    Log::info('User Role IDs:', ['role_ids' => $user->roles->pluck('id')]);
    Log::info('Role Names:', ['roles' => $user->roles->pluck('name')]);
    Log::info('User Role Check for Agent:', ['hasRoleAgent' => $user->hasRole('agent')]);

    // Check if the user has the 'agent' role
    if ($user->hasRole('agent')) {
        Log::info('User is agent');
        return view('agent.broadcast.realtime', compact('balanceAmount'));
    }

    Log::info('User is client');
    return view('client.broadcast.realtime', compact('balanceAmount'));
}
    public function terjadwal()
    {
        $user = Auth::user();
        $balanceAmount = $this->getBalance($user->id);

        Log::info('User Role:', ['role' => $user->roles]);

        if ($user->hasRole('agent')) {
            Log::info('User is agent');
            return view('agent.broadcast.terjadwal', compact('balanceAmount'));
        }

        Log::info('User is client');
        return view('client.broadcast.terjadwal', compact('balanceAmount'));
    }
    public function formatBalance()
    {
        $user = Auth::user();
        $balance = $this->getBalance($user->id);
        // Perform any additional operations needed for formatBalance
    }

    private function getBalance($userId)
    {
        $totals = DB::table('top_ups')
            ->select('user_id', DB::raw('SUM(amount) as total_amount'))
            ->where('user_id', $userId)
            ->groupBy('user_id')
            ->first();

        $total_amount = $totals ? $totals->total_amount : 0;

        $balance = Balance::updateOrCreate(
            ['user_id' => $userId],
            ['amount' => $total_amount]
        );

        return $balance->amount;
    }
}
