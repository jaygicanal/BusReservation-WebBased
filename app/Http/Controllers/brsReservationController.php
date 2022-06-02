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
        $routes = Routing::all();
        $user = Auth::User()->id;
        return view('brsLandingPage')->with('bus_scheds', $bus_scheds)->with('routes', $routes)->with('user', $user);
    }

    // public function search(Request $request){
    //     if(request()->ajax()){
    //         $tableRow = "";
    //         if(!empty($request->origin)){
    //             $data = DB::table('scheduling')
    //                 ->where('origin','LIKE','%'.$request->origin."%")
    //                 ->where('destination', 'LIKE','%'.$request->destination."%")
    //                 ->whereNot('bus_schedule', $request->dayWeek)
    //                 ->get();
    //         }
    //         /* else{
    //             $data = Scheduling::select(["trans_id", "origin", "destination", "via", "bus_schedule", "departure_time", "bus_class", "with_wifi", "with_tv"])
    //                 ->get();
    //         }
    //         return datatables()->of($data)->make(true); */
    //         dd($data);
    //         if($data){
    //             foreach($data as $key => $busScheds){
    //                 $tableRow .= '<tr>'.
    //                 '<td>'.
    //                     '<span data-label="origin">'.$busScheds->origin.'</span> - <span data-label="destination">'.$busScheds->destination.'</span>'.
    //                 '</td>'.
    //                 '<td data-label="departure_time">'.$busScheds->departure_time.'</td>'.
    //                 '<td data-label="bus_class">'.$busScheds->bus_class.'</td>'.
    //                 '<td>'.
    //                     '<div type="button" class="btn-inner">'.
    //                         '<a data-bs-toggle="modal" type="button" data-trans_id="'.$busScheds->trans_id.'" data-depart_time="'.$busScheds->departure_time.'" data-bus_class="'.$busScheds->bus_class.'" data-with_wifi="'.$busScheds->with_wifi.'" data-with_tv="'.$busScheds->with_tv.'" data-fare="'.$busScheds->fare.'" data-bs-target="#bus_details" class="text-nav btn-view-details d-flex align-items-center justify-content-center" id="btn_viewSeats">'.
    //                             '<em class="fa fa-eye" aria-hidden="true"></em>View'.
    //                         '</a>'.
    //                         '@include("brsBusSeat")'.
    //                     '</div>'.
    //                 '</td></tr>';
    //             }
    //             return Response($tableRow);
    //         }
    //     }
    // }

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
