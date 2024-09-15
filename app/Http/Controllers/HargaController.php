<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harga;


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Harga;

class HargaController extends Controller
{   public function edit()
    {
        $hargaForBlast= Harga::all();
        // Your logic here, e.g., return a view for creating content
        return view('admin.komisi.harga.create', [
            'hargaForBlast' => $hargaForBlast,
        ]);
    }
    public function store(Request $request)
{
    // Validasi request dengan nilai default jika harga tidak disediakan
    $validatedData = $request->validate([
        'harga' => 'required|integer'
    ]);
    
    // Mengambil data dari request
    $hargaValue = $validatedData['harga'];

    // Memastikan bahwa hargaValue tidak null, default ke nilai tertentu jika diperlukan
    if ($hargaValue !== null) {
        // Memperbarui kolom 'harga' pada semua entri
        Harga::query()->update(['harga' => $hargaValue]);
    } else {
        // Handle case if hargaValue is null, e.g., set a default value or throw an error
        return redirect()->back()->withErrors('Harga tidak boleh null');
    }

    $data = [
        'user_id' => auth()->user()->id,
        'harga' => $hargaValue
    ];

    // Cek apakah entri dengan kondisi tertentu sudah ada
    $harga = Harga::first(); // or you can use find(id) to get a specific record

    if ($harga) {
        $harga->update($data);
    } else {
        Harga::create($data);
    }

    return redirect()->back()->with('success', 'Data has been saved!');
}
}

 