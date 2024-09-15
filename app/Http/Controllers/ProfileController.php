<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Show the profile edit form
    public function edit(User $user)
    {   
        session()->put('previous_url', url()->previous());
        $user = auth()->user(); // Get the authenticated user
        return view('profile.edit', compact('user'));
    }

    // Handle the profile update request
    public function update(Request $request)
    {
        $user = auth()->user();

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
}
