<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function create()
    {
        return view('admin.DataUser');
    }
}