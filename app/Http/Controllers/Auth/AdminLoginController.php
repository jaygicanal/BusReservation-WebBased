<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;
use App\Models\Admin;
use App\Providers\RouteServiceProvider; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 
use RealRashid\SweetAlert\Facades\Alert;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.brsAdmin');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $credential = Admin::where('email', '=', $request->email)->first();
        if (!$credential) {
            return back()->with('toast_error', 'Email Not Recognized!');
        }
        else {
            if (Hash::check($password, optional($credential)->password))
            {
                $request->session()->put('success');
                if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]))
                    {
                        return redirect()->intended(route('admin.dashboard'))->with('success', 'Login Successfully!');
                    }
            }
            else {

                return redirect()->back()->withInput($request->only('email', 'remember'))->with('toast_error','Password Is Incorrect!');
            }
        }

    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
