<?php
namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\User;
use App\Models\TopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Midtrans;
use App\Http\Controllers\Midtrans\Config;

class TopUpController extends Controller
{
    public function create()
    {
        return view('client.dashboard');
    }
    public function creates()
    {
        return view('agent.dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        TopUp::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
        ]);

        return redirect()->back()->with('success', 'Top-up berhasil!');
    }
    public function __construct()
    {
        // Set konfigurasi Midtrans
        $serverKey = config('midtrans.SB-Mid-server-WYUB58TmBZJmPQPZX1HB87V3');
        $isProduction = config('midtrans.is_production');
        $isSanitized = config('midtrans.is_sanitized');
        $is3ds = config('midtrans.is_3ds');
    }

    public function createTransaction(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleNotification(Request $request)
{
    // Proses notifikasi dari Midtrans
    $notification = new \Midtrans\Notification();
    $transaction = $notification->transaction_status;
    $orderId = $notification->order_id;
    
    // Dapatkan jumlah top-up dari database atau parameter lain berdasarkan order_id
    $topUpAmount = $this->getTopUpAmount($orderId);

    // Lakukan tindakan berdasarkan status transaksi
    if ($transaction == 'capture' || $transaction == 'settlement') {
        // Transaksi sukses
        $this->updateUserBalance($orderId, $topUpAmount);
    } else if ($transaction == 'pending') {
        // Transaksi tertunda
    } else if ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
        // Transaksi gagal
    }
}

protected function getTopUpAmount($orderId)
{
    // Implementasi logika untuk mendapatkan jumlah top-up berdasarkan order_id
    // Misalnya dari database
    return 100000; // Contoh nilai
}

protected function updateUserBalance($orderId, $amount)
{
    // Implementasi logika untuk memperbarui saldo pelanggan berdasarkan order_id
    // Misalnya dari database
    $user = User::where('order_id', $orderId)->first();
    if ($user) {
        $user->balance += $amount;
        $user->save();
    }
}

public function processPayment(Request $request)
{
    // Get the Midtrans configuration value
    $isProduction = config('midtrans.is_production');

    // Set the Midtrans configuration
    Config::$serverKey = $isProduction ? config('midtrans.SB-Mid-client-XWVFStMNP-NY3ywj') : config('midtrans.SB-Mid-server-WYUB58TmBZJmPQPZX1HB87V3');
    Config::$isProduction = $isProduction;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    // Payment details
    $params = [
        'transaction_details' => [
            'order_id' => rand(),
            'gross_amount' => 10000,
        ],
        'customer_details' => [
            'first_name' => 'Budi',
            'last_name' => 'Pratama',
            'email' => 'budi.pra@example.com',
            'phone' => '08111222333',
        ],
    ];

    try {
        // Create transaction
        $snapToken = Snap::getSnapToken($params);

        // Return the Snap token to the front end
        return response()->json(['snap_token' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}