<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('landingpage');
    }
    public function reset()
    {
        return view('reset');
    }
    public function home()
    {
        switch (Auth::user()->role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'agent':
                return redirect()->route('agent.dashboard');
            case 'client':
                return redirect()->route('client.dashboard');
            default:
                return redirect()->route('landingpage');
        }
    }
}
