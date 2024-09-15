<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class KategoriController extends Controller
{   public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.komisi.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.komisi.kategori.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255|unique:kategoris,name',
            'fee' => 'required|numeric',
            'jumlah_anggota' => 'required|integer',
        ]);

        // Create a new Kategori
        $kategori = new Kategori();
        $kategori->name = $request->name;
        $kategori->fee = $request->fee;
        $kategori->jumlah_anggota = $request->jumlah_anggota;
        $kategori->user_id = Auth::id(); // Set the user_id to the authenticated user's ID
        $kategori->save();

        return redirect()->route('admin.komisi.kategori.index')->with('success', 'Kategori created successfully.');
    }
    public function edit($id) {
        $kategori = Kategori::findOrFail($id);
        return view('admin.komisi.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255|unique:kategoris,name,'.$kategori->id,
        'fee' => 'required|numeric',
        'jumlah_anggota' => 'required|integer',
    ]);

    // Update the Kategori
    $kategori->name = $request->name;
    $kategori->fee = $request->fee;
    $kategori->jumlah_anggota = $request->jumlah_anggota;

    if ($kategori->save()) {
        return redirect()->route('admin.komisi.kategori.index')->with('success', 'Kategori updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Kategori update failed.');
    }
    }
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori->delete()) {
            return redirect()->route('admin.komisi.kategori.index')->with('success', 'Kategori deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Kategori delete failed.');
        }
    }
}