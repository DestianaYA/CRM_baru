<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MitraController extends Controller
{   
    public function index()
    {
        $agentId = Auth::user()->id; // Get the logged-in agent's ID
        $users = User::where('agent_id', $agentId)->get(); // Filter users by agent_id
    
        return view('agent.index', compact('users')); // Pass the users to the view
    }
        public function create()
        {
            return view('agent.mitra.create');
        }
        public function order()
        {
            return view('agent.mitra.order');
        }
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('agent.mitra.edit', compact('users'));
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
    
            return redirect()->route('agent.mitra.index')->with('success', 'User updated successfully');
        }
        public function store(Request $request)
        {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'address' => 'required|string|max:500',
            ]);
    
            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $profileImage = $request->file('profile_image');
                $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
                $profileImage->move(public_path('images'), $profileImageName);
            } else {
                $profileImageName = null;
            }
    
            // Create the user
            $user = new User();
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->profile_image = $profileImageName;
            $user->address = $request->address;
            $user->role = 'client';
            $user->agent_id = auth()->user()->id; // Assuming the authenticated user is the agent
            $user->save();
    
            // Redirect with success message
            return redirect()->route('agents.users.index')->with('success', 'Client created successfully.');
        }
    }