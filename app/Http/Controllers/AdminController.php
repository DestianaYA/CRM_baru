<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman utama sesuai dengan peran pengguna.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    if ($request->hasFile('profile_image')) {
        $file = $request->file('profile_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);

        // Delete old profile image if exists
        if ($user->profile_image && file_exists(public_path('images/' . $user->profile_image))) {
            unlink(public_path('images/' . $user->profile_image));
        }

        $user->profile_image = $filename;
    }

    $user->name = $request->input('name');
    $user->phone_number = $request->input('phone_number');
    $user->address = $request->input('address');

    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully');
}
}