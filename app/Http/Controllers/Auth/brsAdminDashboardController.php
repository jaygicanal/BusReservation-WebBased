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

class brsAdminDashboardController extends Controller
{
    public function index(){
        $totReserved = DB::table('reservations')
        ->select(DB::raw('COUNT(*) as total_records'))
        ->whereYear('created_at', '=', Carbon::now()->format('Y'))
        ->where('status', '=', 'Finished')
        ->get();

        //dd($totReserved);
        return view('brsAdminDashboard');
    }

    public function totReservedCancelledperYear(Request $request){
        $data = $request->all();
        $totReservedFinished = DB::table('reservations')
            ->select(DB::raw('COUNT(*) as total_records'), DB::raw('YEAR(created_at) as year, MONTH(created_at) as month'))
            ->groupby('year', 'month')
            ->whereYear('created_at', '=', $data['year'])
            ->where('status', '=', 'Finished')
            ->orderby('month', 'ASC')
            ->get();

        $totReservedCancelled = DB::table('reservations')
        ->select(DB::raw('COUNT(*) as total_records'), DB::raw('YEAR(created_at) as year, MONTH(created_at) as month'))
        ->groupby('year', 'month')
        ->whereYear('created_at', '=', $data['year'])
        ->where('status', '=', 'Cancelled')
        ->orderby('month', 'ASC')
        ->get();

        $monRecords = new Carbon();
        $cancelRecord = 0;
        $finishRecord = 0;
        
        $ctr1 = 0;
        $ctr2 = 0;

        for($i = 1; $i<=12; $i++){

            $monRecords = Carbon::Parse($i)->format('M');
            //condition value for Monthly Male------------
            if($ctr1 >= count($totReservedFinished)){
                $finishRecord = '';
            }else if($i == $totReservedFinished[$ctr1]->month){
                $finishRecord = $totReservedFinished[$ctr1]->total_records;
                $ctr1+=1;
            }else{
                $finishRecord = 0;
            }
            //condition value for Monthly Female------------
            if($ctr2 >= count($totReservedCancelled)){
                $cancelRecord = '';
            }else if($i == $totReservedCancelled[$ctr2]->month){
                $cancelRecord = $totReservedCancelled[$ctr2]->total_records;
                $ctr2+=1;
            }else{
                $cancelRecord = 0;
            }
            

            $dataRecords[] = array(
                "monthlyData" => $monRecords,
                "finishedValue" => $finishRecord,
                "cancelledValue" => $cancelRecord
            );
        }

        //dd($dataRecords);
        
        return response()->json($dataRecords);
    }
    
    public function recordsData(Request $request){
        $data = $request->all();
        $totUser = DB::table('users')
            ->select(DB::raw('COUNT(*) as total_user'))
            ->get();

        $totBooked = DB::table('reservations')
            ->select(DB::raw('COUNT(*) as total_records'))
            ->whereYear('created_at', '=', Carbon::now()->format('Y'))
            ->where('status', '=', 'Finished')
            ->get();

        $totRevenue = DB::table('reservations')
            ->select(DB::raw('SUM(total_fare) as total_revenue'))
            ->whereYear('created_at', '=', $data['year'])
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->where('status', '=', 'Finished')
            ->get();

        //dd($totRevenue);
        $dataRecords = array([
            "totalUser" => $totUser[0]->total_user,
            "totBooked" => $totBooked[0]->total_records,
            "totRevenue" => $totRevenue[0]->total_revenue
        ]);
        return response()->json($dataRecords);
    }
}
