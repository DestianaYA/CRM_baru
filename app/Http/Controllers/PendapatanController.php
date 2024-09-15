<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\TopUp;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 
class PendapatanController extends Controller
{
public function pendapatan()
    {
        return view('superadmin.pengguna');
    }
}