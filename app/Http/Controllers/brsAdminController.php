<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class brsAdminController extends Controller
{
    public function admin()
    {
        return view('auth.brsAdmin');
    }
}


