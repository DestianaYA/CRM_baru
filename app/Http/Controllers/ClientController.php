<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TopUp;
use App\Models\Balance;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Menampilkan halaman utama sesuai dengan peran pengguna.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function topup()
    {
        return view('client.topup');
    }
    public function dashboard()
    {
        return view('client.dashboard');
    }
    public function pesan()
    {
        return view('client.pesan');
    }
    public function back()
    {
        return view('client.dashboard');
    }
    public function transaksi()
    {
        return view('client.transaksi');
    }
    public function whatsapp()
    {
        return view('client.whatsapp-qr');
    }
    public function create()
    {
        $user = Auth::user();
        return view('client.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Update data user
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $user->profile_image = $imageName;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Data berhasil di update');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
    }
    public function clientBalance($userId)
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
    public function client()
    {
        $user = Auth::user();
        $balance = $this->clientBalance($user->id);
        $balanceAmount =($balance);
        return view('client.dashboard', ['balanceAmount' => $balanceAmount]);
    }
}