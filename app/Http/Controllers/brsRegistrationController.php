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
        return view('auth.brsLogin');
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
            'bday' => 'required',
            'age' => 'required',
            'gender' => 'required','in:male,female',
            'discount' => 'required',
            'id_no' => 'required',
            'email' => 'required','email','unique:users',
            'password' => 'required','min:8', 
            're_password' => 'required','same:password',
            'profile_upload' => 'required','file',
        ]); 
            
        if ($validator->fails()) { 
            return redirect()->back()->withErrors('Required field is empty')->withInput(); 
        } 
        
        // dd($request->hasFile('profile_upload'));

        $userprofile = "";
        if($request->hasFile('profile_upload'))
        {
            $upload_img = request()->file('profile_upload')->getClientOriginalName();
            request()->file('profile_upload')->move('images/userProfile_uploads/', $upload_img);
            $userprofile = $upload_img;
        }
        else{
            return redirect()->back()->withErrors('Image Uploaded Not Valid')->withInput(); 
        }
        
        Auth::login($user = User::create([
            'fname' => $request['fname'], 
            'mname' => $request['mname'], 
            'lname' => $request['lname'], 
            'bday' => $request['bday'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'discount' => $request['discount'],
            'id_no' => $request['id_no'],
            'email' => $request['email'],
            'password' =>Hash::make($request['password']),
            're_password' =>Hash::make($request['re_password']),
            'avatar' => $userprofile,
        ]));

        return redirect()->intended(route('dashboard'))->with('success', 'Login Successfully!', $user, 'user');
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
