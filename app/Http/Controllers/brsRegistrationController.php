<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider; 
use Illuminate\Auth\Events\Registered; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 
use RealRashid\SweetAlert\Facades\Alert;

class brsRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.brsLogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.brsRegistration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'fname' => 'required', 
            'mname' => 'required', 
            'lname' => 'required', 
            'gender' => 'required','in:male,female',
            'age' => 'required', 
            'email' => 'required','email','unique:users',
            'password' => 'required','min:8', 
            're_password' => 'required','same:password',
            'avatar' => 'required','file','max:1024', 
        ]); 
            
        if ($validator->fails()) { 
            return redirect()->back()->withErrors('Required field is empty')->withInput(); 
        } 
        
        Auth::login($user = User::create([
            'fname' => $request['fname'], 
            'mname' => $request['mname'], 
            'lname' => $request['lname'], 
            'age' => $request['age'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'password' =>Hash::make($request['password']),
            're_password' =>Hash::make($request['re_password']),
            'avatar' => $request['avatar'],
        ]));
        //$user->attachRole($request->role);  
        event(new Registered($user));

        return redirect()->intended(route('dashboard'))->with('success', 'Login Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
