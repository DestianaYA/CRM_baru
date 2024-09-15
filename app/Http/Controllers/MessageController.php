<?php

namespace App\Http\Controllers;

use NumberFormatter;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\TopUp;
use App\Models\Balance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        // Apply middleware to check if the user is 'agent' or 'client'
        $this->middleware('role:agent,client')->only(['create', 'store']);
    }

    public function calculateBalance($userId)
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

    public function create()
    {
        $user = Auth::user();
        $balance = $this->calculateBalance($user->id);
        $balanceAmount = $balance;

        if ($user->role == 'agent') {
            return view('agent.form.create', compact('balanceAmount'));
        } elseif ($user->role == 'client') {
            return view('client.form.create', compact('balanceAmount'));
        }

        abort(403, 'Unauthorized action.');
    }

    public function store(Request $request)
    {
        \Log::info('Store method accessed by user: ' . auth()->id());
    
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        Message::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'message' => $request->message,
        ]);
    
        return redirect()->route('form.create')->with('success', 'Message sent successfully!');
    }
}
