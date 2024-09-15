<?php

namespace App\Http\Controllers;

use NumberFormatter;

use Illuminate\Http\Request;
use App\Models\Broadcast;

use App\Models\TopUp;
use App\Models\Balance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{public function index()
    {
        return view('superadmin.transaksi');
    }
    
}