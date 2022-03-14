<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class brsLandingPage extends Controller
{
    public function landingPage()
    {
        return view('auth.brsLandingPage');
    }
}
