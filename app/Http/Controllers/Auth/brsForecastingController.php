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
        $totReserved = DB::table('reservations')
            ->select(DB::raw('COUNT(*) as total_reserved'),DB::raw('YEAR(created_at) as year, MONTH(created_at) as month'))
            ->groupby('year', 'month')
            ->get();

        $totGenderReserved = DB::table('reservations')
            ->join('users', 'reservations.user_id', 'users.id')
            ->select('reservation.*', 'users.gender')
            ->select(DB::raw('COUNT(users.gender) as totalGender_reserved'),DB::raw('YEAR(reservations.created_at) as year, MONTH(reservations.created_at) as month'))
            ->groupby('year', 'month')
            ->where('gender', '=', 'Female')
            ->get();

        //dd($totGenderReserved);
        return view('brsForecasting');
    }

    public function forecastReserved(Request $request){
        $totReserved = DB::table('reservations')
            ->select(DB::raw('COUNT(*) as total_reserved'),DB::raw('YEAR(created_at) as year, MONTH(created_at) as month'))
            ->groupby('year', 'month')
            ->get();

        //dd($totReserved);

        $monthForecast = "";
        $monReservedValue = 0;
        /* $forecastRevenueValue = 0;
        $foreloop = 0; */
        $ctr = 0;
        for($i = 1; $i<=12; $i++){
            
            if($i == 1){
                $monthForecast = "Jan";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
                //condition value for Forecast Revenue------------
                /* if($foreloop >= count($forecast_totRevenue)){
                    $forecastRevenueValue = '';
                }else if($i == $forecast_totRevenue[$foreloop]->month){
                    $forecastRevenueValue = $forecast_totRevenue[$foreloop]->totRevenue;
                    $foreloop+=1;
                }else{
                    $forecastRevenueValue = 0;
                } */
            }else if($i == 2){
                $monthForecast = "Feb";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 3){
                $monthForecast = "Mar";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 4){
                $monthForecast = "Apr";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 5){
                $monthForecast = "May";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 6){
                $monthForecast = "Jun";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 7){
                $monthForecast = "Jul";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 8){
                $monthForecast = "Aug";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 9){
                $monthForecast = "Sep";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 10){
                $monthForecast = "Oct";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 11){
                $monthForecast = "Nov";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }else if($i == 12){
                $monthForecast = "Dec";
                //condition value for Monthly Revenue------------
                if($ctr >= count($totReserved)){
                    $monReservedValue = '';
                }else if($i == $totReserved[$ctr]->month){
                    $monReservedValue = $totReserved[$ctr]->total_reserved;
                    $ctr+=1;
                }else{
                    $monReservedValue = 0;
                }
            }

            $dataRevenue[] = array(
                "monthlyData" => $monthForecast,
                "reservedValue" => $monReservedValue,
                //"forecastRevenue" => $forecastRevenueValue
            );
        }
        
        return response()->json($dataRevenue);
    }

    public function forecastGender(Request $request){
        $totGenderMale = DB::table('reservations')
            ->join('users', 'reservations.user_id', 'users.id')
            ->select('reservation.*', 'users.gender')
            ->select(DB::raw('COUNT(users.gender) as totalMale_reserved'),DB::raw('YEAR(reservations.created_at) as year, MONTH(reservations.created_at) as month'))
            ->groupby('year', 'month')
            ->where('gender', '=', 'Female')
            ->get();

        $totGenderFemale = DB::table('reservations')
            ->join('users', 'reservations.user_id', 'users.id')
            ->select('reservation.*', 'users.gender')
            ->select(DB::raw('COUNT(users.gender) as totalFemale_reserved'),DB::raw('YEAR(reservations.created_at) as year, MONTH(reservations.created_at) as month'))
            ->groupby('year', 'month')
            ->where('gender', '=', 'Male')
            ->get();

        //dd($totReserved);

        $monthForecast = "";
        $monMaleValue = 0;
        $monFemaleValue = 0;
        /* $forecastRevenueValue = 0;
        $foreloop = 0; */
        $ctrMale = 0;
        $ctrFemale = 0;
        for($i = 1; $i<=12; $i++){
            
            if($i == 1){
                $monthForecast = "Jan";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 2){
                $monthForecast = "Feb";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 3){
                $monthForecast = "Mar";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 4){
                $monthForecast = "Apr";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 5){
                $monthForecast = "May";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 6){
                $monthForecast = "Jun";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 7){
                $monthForecast = "Jul";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 8){
                $monthForecast = "Aug";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 9){
                $monthForecast = "Sep";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 10){
                $monthForecast = "Oct";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 11){
                $monthForecast = "Nov";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }else if($i == 12){
                $monthForecast = "Dec";
                //condition value for Monthly Revenue------------
                if($ctrMale >= count($totGenderMale)){
                    $monMaleValue = '';
                }else if($i == $totGenderMale[$ctrMale]->month){
                    $monMaleValue = $totGenderMale[$ctrMale]->totalMale_reserved;
                    $ctrMale+=1;
                }else{
                    $monMaleValue = 0;
                }
                //condition value for Forecast Revenue------------
                if($ctrFemale >= count($totGenderFemale)){
                    $monFemaleValue = '';
                }else if($i == $totGenderFemale[$ctrFemale]->month){
                    $monFemaleValue = $totGenderFemale[$ctrFemale]->totalFemale_reserved;
                    $ctrFemale+=1;
                }else{
                    $monFemaleValue = 0;
                }
            }

            $dataRevenue[] = array(
                "monthlyData" => $monthForecast,
                "maleValue" => $monMaleValue,
                "femaleValue" => $monFemaleValue
            );
        }
        
        return response()->json($dataRevenue);
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
