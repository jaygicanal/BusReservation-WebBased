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

class brsBookedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booked = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('scheduling', 'reservations.trans_id', '=', 'scheduling.trans_id')
            ->select('reservations.*', 'scheduling.bus_class', 'scheduling.with_wifi', 'scheduling.with_tv', 'scheduling.fare', 'users.fname', 'users.mname', 'users.lname', 'users.discount')
            ->get();
        // dd($booked);
        return view('brsBooking')->with('booked', $booked);
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
        $reservation_id = Reservation::find($id);
        //echo "<pre>"; print_r($inventory); die; 
        return view('brsBooking')->with($reservation_id, $id);
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
        $status = "Confirmed";

        $payment = array(
            'status' => $status,
        ); 
        
        $reserved = Reservation::findOrFail($request->id)->update($payment);
        return redirect()->route('booked')->with('success', 'Paid Successfully.');
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
