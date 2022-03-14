<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class brsLoginController extends Controller
{
    public function login()
    {
        return view('auth.brsLogin');
    }
}
