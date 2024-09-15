<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('agent.mitra.index', compact('users'));
    }
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        return view('agent.dashboard');
    }
    public function pesan()
    {
        return view('agent.pesan');
    }
    public function order()
    {
        return view('agent.transaksi');
    }
    public function topups()
    {
        return view('agent.topup');
    }
    public function form()
    {
        return view('agent.form.create');
    }
    public function transaksi()
    {
        return view('agent.orders');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
    }
    public function showBalance()
    {
    $balanceAmount = 1000; // or retrieve the balance amount from the database
    return view('agent.dashboard', compact('balanceAmount'));
    }
}
