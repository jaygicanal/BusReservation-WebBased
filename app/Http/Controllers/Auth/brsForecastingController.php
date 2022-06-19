<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Forecasting;
use App\Providers\RouteServiceProvider; 
use Illuminate\Auth\Events\Registered; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
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
        $totRecord = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('COUNT(users.age) as total_records'),DB::raw('YEAR(reservations.created_at) as year, MONTH(reservations.created_at) as month'))
                ->groupby('year', 'month')
                ->whereYear('reservations.created_at', '=', '2022')
                ->where('users.age', '>=', 65)
                ->get();
        
        //dd($totRecord);
        return view('brsForecasting');
    }

    //-----------------FORECASTING GENDER
    public function forecastGender(Request $request){
        $data = $request->all();
        $year = 0;

        $age1 = 0;
        $age2 = 0;

        if($data['record'] == "Children"){
            $age1 = 0;
            $age2 = 14;
        }else if($data['record'] == "Working Age"){
            $age1 = 15;
            $age2 = 64;
        }

        if($data['year'] == ""){
            $year = Carbon::now()->format('Y');
        }else{
            $year = $data['year'];
        }

        if($data['record'] == "All"){
            $totRecord = DB::table('reservations')
                ->select(DB::raw('COUNT(*) as total_records'),DB::raw('YEAR(created_at) as year, MONTH(created_at) as month'))
                ->groupby('year', 'month')
                ->whereYear('created_at', '=', $year)
                ->get();
        }
        else if($data['record'] == "Male" || $data['record']=="Female"){
            $totRecord = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.gender')
                ->select(DB::raw('COUNT(users.gender) as total_records'),DB::raw('YEAR(reservations.created_at) as year, MONTH(reservations.created_at) as month'))
                ->groupby('year', 'month')
                ->whereYear('reservations.created_at', '=', $year)
                ->where('gender', '=', $data['record'])
                ->get();                
        }else if($data['record'] == "Children" || $data['record'] == "Working Age"){
            $totRecord = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('COUNT(users.age) as total_records'),DB::raw('YEAR(reservations.created_at) as year, MONTH(reservations.created_at) as month'))
                ->groupby('year', 'month')
                ->whereYear('reservations.created_at', '=', $year)
                ->whereBetween('users.age', [$age1, $age2])
                ->get();
        }else if($data['record'] == "Seniors"){
            $totRecord = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('COUNT(users.age) as total_records'),DB::raw('YEAR(reservations.created_at) as year, MONTH(reservations.created_at) as month'))
                ->groupby('year', 'month')
                ->whereYear('reservations.created_at', '=', $year)
                ->where('users.age', '>=', 65)
                ->get();
        }
        

        $forecastRecord = DB::table('forecasting')
            ->select(DB::raw('total_value as forecastValue'),DB::raw('YEAR(month_forecast) as year, MONTH(month_forecast) as month'))
            ->groupby('forecastValue','year', 'month')
            ->whereYear('month_forecast', '=', $year)
            ->where('forecast_type', '=', $data['record'])
            ->get();

        $monthForecast = "";
        $monRecordValue = 0;
        $monForecast = 0;

        $ctr = 0;
        $ctrFore = 0;
        for($i = 1; $i<=12; $i++){
            
            if($i == 1){
                $monthForecast = "Jan";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 2){
                $monthForecast = "Feb";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 3){
                $monthForecast = "Mar";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 4){
                $monthForecast = "Apr";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 5){
                $monthForecast = "May";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 6){
                $monthForecast = "Jun";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 7){
                $monthForecast = "Jul";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 8){
                $monthForecast = "Aug";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 9){
                $monthForecast = "Sep";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 10){
                $monthForecast = "Oct";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 11){
                $monthForecast = "Nov";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }else if($i == 12){
                $monthForecast = "Dec";
                //condition value for Monthly Male------------
                if($ctr >= count($totRecord)){
                    $monRecordValue = '';
                }else if($i == $totRecord[$ctr]->month){
                    $monRecordValue = $totRecord[$ctr]->total_records;
                    $ctr+=1;
                }else{
                    $monRecordValue = 0;
                }
                //condition value for Monthly Female------------
                if($ctrFore >= count($forecastRecord)){
                    $monForecast = '';
                }else if($i == $forecastRecord[$ctrFore]->month){
                    $monForecast = $forecastRecord[$ctrFore]->forecastValue;
                    $ctrFore+=1;
                }else{
                    $monForecast = 0;
                }
            }

            $dataRevenue[] = array(
                "monthlyData" => $monthForecast,
                "recordsValue" => $monRecordValue,
                "forecastValue" => $monForecast
            );
        }
        
        return response()->json($dataRevenue);
    }

    public function yearRecordListGender(Request $request){
        $data = $request->all();
        
        $age1 = 0;
        $age2 = 0;
        if($data['records'] == "Children"){
            $age1 = 0;
            $age2 = 14;
        }else if($data['records'] == "Working Age"){
            $age1 = 15;
            $age2 = 64;
        }

        if($data['records'] == "All"){
            $totRecords = DB::table('reservations')
                ->select(DB::raw('YEAR(created_at) as year'))
                ->groupby('year')
                ->get();
            
        }
        else if($data['records'] == "Male" || $data['records']=="Female"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.gender')
                ->select(DB::raw('YEAR(reservations.created_at) as year'))
                ->groupby('year')
                ->where('gender', '=', $data['records'])
                ->get();
        }else if($data['records'] == "Children" || $data['records'] == "Working Age"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('YEAR(reservations.created_at) as year'))
                ->groupby('year')
                ->whereBetween('users.age', [$age1, $age2])
                ->get();
        }else if($data['records'] == "Seniors"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('YEAR(reservations.created_at) as year'))
                ->groupby('year')
                ->where('users.age', '>=', 65)
                ->get();
        }
        
        //dd($totGenderMale);
        if (count($totRecords) > 0) {
            foreach ($totRecords as $recordYear) {
                $yearsList[] = array(
                    "id" => $recordYear->year,
                    "text" => $recordYear->year,
                );
            }
        }

        return response()->json($yearsList);
    }

    public function monthRecordListGender(Request $request){
        $data = $request->all();

        $age1 = 0;
        $age2 = 0;
        if($data['records'] == "Children"){
            $age1 = 0;
            $age2 = 14;
        }else if($data['records'] == "Working Age"){
            $age1 = 15;
            $age2 = 64;
        }

        if($data['records'] == "All"){
            $totRecords = DB::table('reservations')
                ->select(DB::raw('COUNT(*) as total_records'), DB::raw('MONTH(created_at) as month'))
                ->groupby('month')
                ->whereYear('created_at', '=', $data['year'])
                ->get();
            
        }
        else if($data['records'] == "Male" || $data['records']=="Female"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.gender')
                ->select(DB::raw('COUNT(users.gender) as total_records'), DB::raw('MONTH(reservations.created_at) as month'))
                ->groupby('month')
                ->where('gender', '=', $data['records'])
                ->whereYear('reservations.created_at', '=', $data['year'])
                ->get();
        }else if($data['records'] == "Children" || $data['records'] == "Working Age"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('COUNT(users.age) as total_records'), DB::raw('MONTH(reservations.created_at) as month'))
                ->groupby('month')
                ->whereYear('reservations.created_at', '=', $data['year'])
                ->whereBetween('users.age', [$age1, $age2])
                ->get();
        }else if($data['records'] == "Seniors"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('COUNT(users.age) as total_records'), DB::raw('MONTH(reservations.created_at) as month'))
                ->groupby('month')
                ->whereYear('reservations.created_at', '=', $data['year'])
                ->where('users.age', '>=', 65)
                ->get();
        }

        if (count($totRecords) > 0) {

            foreach ($totRecords as $recordsData) {
                $month = "";
                if($recordsData->month == 1){
                    $month = "Jan";
                }else if($recordsData->month == 2){
                    $month = "Feb";
                }else if($recordsData->month == 3){
                    $month = "Mar";
                }else if($recordsData->month == 4){
                    $month = "Apr";
                }else if($recordsData->month == 5){
                    $month = "May";
                }else if($recordsData->month == 6){
                    $month = "Jun";
                }else if($recordsData->month == 7){
                    $month = "Jul";
                }else if($recordsData->month == 8){
                    $month = "Aug";
                }else if($recordsData->month == 9){
                    $month = "Sep";
                }else if($recordsData->month == 10){
                    $month = "Oct";
                }else if($recordsData->month == 11){
                    $month = "Nov";
                }else if($recordsData->month == 12){
                    $month = "Dec";
                }

                $monthsList[] = array(
                    "id" => $recordsData->month,
                    "text" => $month." (".$recordsData->total_records.")",
                );
            }
        }

        return response()->json($monthsList);
    }

    public function valueRecordListGender(Request $request){
        $data = $request->all();

        $age1 = 0;
        $age2 = 0;
        if($data['records'] == "Children"){
            $age1 = 0;
            $age2 = 14;
        }else if($data['records'] == "Working Age"){
            $age1 = 15;
            $age2 = 64;
        }

        if($data['records'] == "All"){
            $totRecords = DB::table('reservations')
                ->select(DB::raw('COUNT(*) as total_records'))
                ->whereYear('created_at', '=', $data['year'])
                ->whereMonth('created_at', '=', $data['month'])
                ->get();
            
        }
        else if($data['records'] == "Male" || $data['records']=="Female"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.gender')
                ->select(DB::raw('COUNT(users.gender) as total_records'))
                ->where('gender', '=', $data['records'])
                ->whereYear('reservations.created_at', '=', $data['year'])
                ->whereMonth('reservations.created_at', '=', $data['month'])
                ->get();
        }else if($data['records'] == "Children" || $data['records'] == "Working Age"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('COUNT(users.age) as total_records'))
                ->whereYear('reservations.created_at', '=', $data['year'])
                ->whereMonth('reservations.created_at', '=', $data['month'])
                ->whereBetween('users.age', [$age1, $age2])
                ->get();
        }else if($data['records'] == "Seniors"){
            $totRecords = DB::table('reservations')
                ->join('users', 'reservations.user_id', 'users.id')
                ->select('reservations.*', 'users.age')
                ->select(DB::raw('COUNT(users.age) as total_records'))
                ->whereYear('reservations.created_at', '=', $data['year'])
                ->whereMonth('reservations.created_at', '=', $data['month'])
                ->where('users.age', '>=', 65)
                ->get();
        }

        return response()->json($totRecords);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brsForecasting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = $request['values'];
        $totVal = 0;
        //dd($supply);
        for($i = 0; $i < count($values); $i++){
            $totVal += (int)$values[$i]; 
        }//dd($totSup/count($request['totalSupply']));

        $avg = $totVal/count($values);

        $forecast = Forecasting::create([
            'forecast_type' => $request['typeForecast'],
            'total_value' => $avg,
            'month_forecast' => $request['monthForecast'].-01,
        ]); 
        event(new Registered($forecast));

        if ($request['typeForecast'] == "Male" || $request['typeForecast'] == "Female") {
            return redirect()->intended(route('forecasting'))->with('success', 'Forecast Successfully!');
        }else if ($request['typeForecast'] == "Demand") {
            return redirect()->intended(route('forecasting-demand'))->with('success', 'Forecast Successfully!');
        }else if ($request['typeForecast'] == "Revenue") {
            return redirect()->intended(route('forecasting-revenue'))->with('success', 'Forecast Successfully!');
        }
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
