<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('admin.dashboard', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    public function user()
    {
        return view('admin.dashboard');
    }
    public function create()
    {
        return view('admin.DataUser.create');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }
    public function tampil($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
        ]);

        $user->name = $request->name;
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $user->profile_image = $imageName;
        }
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }

    public function store(Request $request)
{
    Log::info('Creating new user: ', $request->all());
    Log::info('Currently logged in user: ', Auth::user()->toArray());

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'role' => 'required|string',
        'address' => 'required|string',
        'phone_number' => 'required|string|max:15',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->role = $request->role;
    $user->address = $request->address;
    $user->phone_number = $request->phone_number;

    $user->name = $request->name;
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $user->profile_image = $imageName;
        }

    $user->save();

    return redirect()->back()->with('success', 'User created successfully.');
}
}
