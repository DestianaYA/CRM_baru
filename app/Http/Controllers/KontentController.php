<?php

namespace App\Http\Controllers;

use view;
use App\Models\Kontent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\TermsCondition;


class KontentController extends Controller
{
        public function edit()
        {
            $kontenForRoles= Kontent::all();
            // Your logic here, e.g., return a view for creating content
            return view('admin.kontent', [
                'kontenForRoles' => $kontenForRoles,
            ]);
        }
        public function store(Request $request)
        {
            $request->validate([
                'notif' => 'required_without:sk',
                'sk' => 'required_without:notif',
            ]);
            $data = [];
            $Kontent= Kontent::where('role', $request->role);
            if($request->notif!=null){

                $Kontent->update(array(
                    'notif' => $request->notif,
                )); 
            };
            if($request->sk!=null){

                $Kontent->update(array(
                    'sk'=> $request->sk,
                )); 
            };
            $data['user_id'] = auth()->user()->id;
            if ($Kontent) {
                $Kontent->update($data);
            } else {
                Kontent::create($data);
            }
            return redirect()->back()->with('success', 'Data has been saved!');
        }
}