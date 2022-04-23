<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Providers\RouteServiceProvider; 
use Illuminate\Auth\Events\Registered; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 
use RealRashid\SweetAlert\Facades\Alert;

class brsLoginController extends Controller
{
    public function index()
    {
        return view('auth.brsLogin');
    }

    public function userlogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $credential = User::where('email', '=', $request->email)->first();
        if (!$credential) {
            return back()->with('toast_error', 'Email Not Recognized!');
        }
        else {
            if (Hash::check($password, optional($credential)->password))
            {
                $request->session()->put('success');
                if (Auth::attempt(['email' => $email, 'password' => $password]))
                    {
                        return redirect()->intended(route('dashboard'))->with('success', 'Login Successfully!');
                    }
            }
            else {
                return back()->with('toast_error','Password Is Incorrect!');
            }
            
        }
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('brsLandingPage');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
