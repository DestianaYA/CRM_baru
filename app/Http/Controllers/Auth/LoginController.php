<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }  
    public function logout()
    {
        auth()->logout();
        return redirect('/'); // redirect to homepage or any other route
    }
    use AuthenticatesUsers;

    protected $redirectTo = '/home';


    public function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectPath());
    }


    public function showLoginForm()
    {
        return view('login');
    }
    public function logoutAllUsers()
    {
        session(['logout_all_users' => true]);
        return redirect()->route('home')->with('message', 'All users have been logged out.');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/home');
        }
        

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
}
