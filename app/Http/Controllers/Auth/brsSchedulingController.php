<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Scheduling;
use App\Models\Routing;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered; 
use Illuminate\Support\Facades\Auth; 

class brsSchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheds = Scheduling::all();
        $routes = Routing::all();
        return view('brsScheduling')->with('scheds', $scheds)->with('routes', $routes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brsScheduling');
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
            'trans_id' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'via' => 'required',
            'bus_schedule' => 'required',
            'departure_time' => 'required',
            'bus_class' => 'required',
            'with_wifi' => 'required',
            'with_tv' => 'required',
        ]);

        if ($validator->fails()) { 
            return redirect()->back()->withErrors('Required field is empty')->withInput(); 
        }
        
        $schedule = Scheduling::create([
            'trans_id' => $request['trans_id'], 
            'origin' => $request['origin'], 
            'destination' => $request['destination'],
            'via' => $request['via'], 
            'bus_schedule' => $request['bus_schedule'], 
            'departure_time' => $request['departure_time'],
            'bus_class' => $request['bus_class'],
            'with_wifi' => $request['with_wifi'],
            'with_tv' => $request['with_tv'],
        ]);
        event(new Registered($schedule));

        return redirect()->route('scheduling')->with('success', 'Added Successfully!');
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
