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
use DB;

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
        $routes = DB::table('routings')
            ->orderBy('place', 'asc')
            ->get();
        
        return view('brsScheduling')->with('scheds', $scheds)->with('routes', $routes);
    }

    public function fetchReservedSchedule(Request $request){
        $data = $request->all();
        
        $totRecordSeat = DB::table('reservations')
            ->join('scheduling', 'reservations.trans_id', 'scheduling.trans_id')
            ->join('users', 'reservations.user_id', 'users.id')
            ->select('reservations.*', 'scheduling.trans_id', 'users.fname', 'users.lname')
            ->select('reservations.seat_no', 'users.fname', 'users.lname')
            ->where('reservations.trans_id', '=', $data['id'])
            ->where('reservations.departure_date', '=', $data['date'])
            ->whereNotIn('status', ["Cancelled", "Finished"])
            ->orderBy('reservations.seat_no', 'ASC')
            ->get();
        
        //dd($totRecordSeat);

        return response()->json($totRecordSeat);
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
            'bus_schedule' => 'required',
            'departure_time' => 'required',
            'bus_class' => 'required',
            'with_wifi' => 'required',
            'with_tv' => 'required',
            'fare' => 'required',
        ]);

        if ($validator->fails()) { 
            return redirect()->back()->withErrors('Required field is empty')->withInput(); 
        }
        
        $schedule = Scheduling::create([
            'trans_id' => $request['trans_id'], 
            'origin' => $request['origin'], 
            'destination' => $request['destination'],
            'bus_schedule' => $request['bus_schedule'], 
            'departure_time' => $request['departure_time'],
            'bus_class' => $request['bus_class'],
            'with_wifi' => $request['with_wifi'],
            'with_tv' => $request['with_tv'],
            'fare' => $request['fare'], 
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
