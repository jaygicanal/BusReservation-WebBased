<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Providers\RouteServiceProvider; 
use Illuminate\Auth\Events\Registered; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class brsForecastingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phone_count_18 = Product::where('product_type','phone')->where('year','2018')->get()->count(); 
    	$phone_count_19 = Product::where('product_type','phone')->where('year','2019')->get()->count();
    	
    	    	    	
    	return view('brsForecasting',compact('phone_count_18','phone_count_19','phone_count_20','laptop_count_18','laptop_count_19','laptop_count_20','tablet_count_18','tablet_count_19','tablet_count_20'));
    }

    public function linechart(Request $request)
    {
    	$phone_count_18 = Product::where('product_type','phone')->where('year','2018')->get()->count(); 
    	$phone_count_19 = Product::where('product_type','phone')->where('year','2019')->get()->count();
    	$phone_count_20 = Product::where('product_type','phone')->where('year','2020')->get()->count();   	
    	
    	$laptop_count_18 = Product::where('product_type','laptop')->where('year','2018')->get()->count();
    	$laptop_count_19 = Product::where('product_type','laptop')->where('year','2019')->get()->count();
    	$laptop_count_20 = Product::where('product_type','laptop')->where('year','2020')->get()->count();

    	$tablet_count_18 = Product::where('product_type','tablet')->where('year','2018')->get()->count();
    	$tablet_count_19 = Product::where('product_type','tablet')->where('year','2019')->get()->count();
    	$tablet_count_20 = Product::where('product_type','tablet')->where('year','2020')->get()->count();
    	    	    	
    	return view('linechart',compact('phone_count_18','phone_count_19','phone_count_20','laptop_count_18','laptop_count_19','laptop_count_20','tablet_count_18','tablet_count_19','tablet_count_20'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
