<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered; 
use Illuminate\Support\Facades\Auth; 

class AdminRegisterController extends Controller
{

    public function index()
    {
        return view('auth.brsAdmin');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'fname' => 'required', 
            'mname' => 'required', 
            'lname' => 'required', 
            'contact' => 'required', 
            'address' => 'required',
            'email' => 'required','email','unique:users',
            'password' => 'required','min:8', 
            'reg_re_password' => 'required','same:password',
            'avatar' => 'required','file','max:1024', 
        ]); 
            
        if ($validator->fails()) { 
            return redirect()->back()->withErrors('Required field is empty')->withInput(); 
        } 
        
        $user = Admin::create([
            'fname' => $request['fname'], 
            'mname' => $request['mname'], 
            'lname' => $request['lname'], 
            'email' => $request['email'],
            'address' => $request['address'],
            'contact' => $request['contact'],
            'password' =>Hash::make($request['password']),
            'avatar' => $request['avatar'],
        ]);
        
        return redirect()->route('admin.dashboard')->with('success', 'Login Successfully!');
    }


}
