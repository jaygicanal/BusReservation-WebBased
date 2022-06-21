<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheduling;
use App\Models\Routing;
use App\Models\Reservation;
use App\Providers\RouteServiceProvider; 
use Illuminate\Auth\Events\Registered; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class brsReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bus_scheds = Scheduling::all();
        $routes = DB::table('routings')
            ->orderBy('place', 'asc')
            ->get();
        $user = Auth::User()->id;

        $totRecord = DB::table('reservations')
            ->join('scheduling', 'reservations.trans_id', 'scheduling.trans_id')
            ->select('reservations.*', 'scheduling.trans_id')
            ->select('reservations.seat_no')
            ->where('reservations.origin', '=', 'Bulan Terminal')
            ->where('reservations.destination', '=', 'Sorsogon Terminal')
            ->where('reservations.departure_date', '=', '2022-06-24')
            ->whereNotIn('status', ["Cancelled", "Finished"])
            ->get();
        //dd($totRecord);
        return view('brsLandingPage')->with('bus_scheds', $bus_scheds)->with('routes', $routes)->with('user', $user);
    }

    public function searchBusSeat(Request $request){
        $data = $request->all();
        
        $totRecordSeat = DB::table('reservations')
            ->join('scheduling', 'reservations.trans_id', 'scheduling.trans_id')
            ->select('reservations.*', 'scheduling.trans_id')
            ->select('reservations.seat_no')
            ->where('reservations.origin', '=', $data['origin'])
            ->where('reservations.destination', '=', $data['destination'])
            ->where('reservations.departure_date', '=', $data['date'])
            ->whereNotIn('status', ["Cancelled", "Finished"])
            ->get();
        
        //dd($totRecord);

        return response()->json($totRecordSeat);
    }

    public function search(Request $request){
        $data = $request->all();
        $schedule = "";
        $totRecord = "";

        if($data['schedule'] == "Weekdays"){
            $schedule = "Weekend";
        }else if($data['schedule'] == "Weekend"){
            $schedule = "Weekdays";
        }
        
        $totRecord = DB::table('scheduling')
            ->where('origin', '=', $data['origin'])
            ->where('destination', '=', $data['destination'])
            ->where('bus_schedule', '!=', $schedule)
            ->get();
        
        //dd($totRecord);

        return response()->json($totRecord);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brsLandingPage');
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
            'reservation_id' => 'required',
            'user_id' => 'required',
            'transit_id' => 'required',
            'origin_confirmation' => 'required',
            'destination_confirmation' => 'required',
            'date_confirmation' => 'required',
            'departure_time' => 'required',
            'seat_no' => 'required',
            'totalFare' => 'required',
        ]);

        if ($validator->fails()) { 
            return redirect()->back()->withErrors('Required field is empty')->withInput(); 
        }
        
        $id = $request->input('reservation_id');

        $reserved = Reservation::create([
            'reservation_id' => $request['reservation_id'],
            'user_id' => $request['user_id'],
            'trans_id' => $request['transit_id'], 
            'origin' => $request['origin_confirmation'], 
            'destination' => $request['destination_confirmation'],
            'departure_date' => $request['date_confirmation'], 
            'departure_time' => $request['departure_time'], 
            'seat_no' => $request['seat_no'], 
            'total_fare' => $request['totalFare'],
        ]);
        event(new Registered($reserved));

        return redirect()->intended(route('payment'))->with('success', 'Seat Reserved!')->withInput($request->flashOnly('reservation_id'));
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
        return view('brsPayment')->with($reservation_id, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_options' => 'required',
            'imgUpload' => 'required','file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors('Validation Error')->withInput();
        }


        $sendPayment = "";
        if($request->hasFile('imgUpload'))
        {
            
            $upload_img = request()->file('imgUpload')->getClientOriginalName();
            request()->file('imgUpload')->move('images/Payment/', $upload_img);
            $sendPayment = $upload_img;
        }

        $status = "Booked";

        $payment = array(
            'payment_type' => $request['payment_options'],
            'payment_ss' => $sendPayment,
            'status' => $status,
        ); 
        
        $reserved = Reservation::findOrFail($request->reservation_id)->update($payment);
        return redirect()->route('dashboard')->with('success', 'Paid Successfully.');
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
