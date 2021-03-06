<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brsLoginController;
use App\Http\Controllers\brsRegistrationController;
use App\Http\Controllers\brsReservationController;
use App\Http\Controllers\brsPaymentController;
use App\Http\Controllers\brsHistoryController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\brsAdminDashboardController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\brsSchedulingController;
use App\Http\Controllers\Auth\brsRoutingController;
use App\Http\Controllers\Auth\brsBookedController;
use App\Http\Controllers\Auth\brsForecastingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('admin/', function () {
    return view('auth.brsAdmin');
});
// FOR ADMIN REGISTRATION AND LOGIN
Route::prefix('admin')->group(function() {
    Route::get('/login',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login',[AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AdminRegisterController::class, 'index'])->name('admin.register');
    Route::post('/register', [AdminRegisterController::class, 'store'])->name('admin.register.submit');

    //=====DASHBOARD FETCH DATA AND VIEWS======//
    Route::get('/dashboard', [brsAdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/searchReserveCancel', [brsAdminDashboardController::class, 'totReservedCancelledperYear'])->name('searchRC');
    Route::get('/fetchRecords', [brsAdminDashboardController::class, 'recordsData'])->name('fetchRecords');

    Route::get('/scheduling', [brsSchedulingController::class, 'index'])->name('scheduling');
    Route::resource('/schedule', brsSchedulingController::class);
    Route::get('/fetchReservedRecords', [brsSchedulingController::class, 'fetchReservedSchedule'])->name('reservedeRecords');

    Route::resource('/routing', brsRoutingController::class);


    Route::get('/manage-booking', [brsBookedController::class, 'index'])->name('booked');
    Route::resource('/manage-booked', brsBookedController::class);

    Route::get('manage-forecast', [brsForecastingController::class, 'index'])->name('forecasting');
    Route::resource('/forecast', brsForecastingController::class);

    Route::get('reserved-forecast', [brsForecastingController::class, 'forecastReserved'])->name('reserved');
    Route::get('gender-forecast', [brsForecastingController::class, 'forecastGender'])->name('genderForecast');

    //Fetch Reserved Gender List of Records
    Route::get('yearGender-record', [brsForecastingController::class, 'yearRecordListGender'])->name('yearRecordsGender');
    Route::get('monthGender-record', [brsForecastingController::class, 'monthRecordListGender'])->name('monthRecordsGender');
    Route::get('valueGender-record', [brsForecastingController::class, 'valueRecordListGender'])->name('valueRecordsGender');
});

// FOR NORMAL USER REGISTRATION AND LOGIN
Route::get('/login', [brsLoginController::class, 'index'])->name('login');
Route::post('user-login', [brsLoginController::class, 'userlogin'])->name('user.login');
Route::get('sign-out', [brsLoginController::class, 'signOut'])->name('user.signout');
Route::resource('/register', brsRegistrationController::class);



Route::group([ 'middleware' => ['auth']], function () {
    Route::get('/', [brsReservationController::class, 'index'])->name('dashboard');
    Route::get('searchBusSched', [brsReservationController::class, 'search'])->name('searchBusSchedule');
    Route::get('searchBusSeat', [brsReservationController::class, 'searchBusSeat'])->name('searchSeats');
    Route::post('booked-cancel', [brsReservationController::class, 'bookCancellation'])->name('bookCancel');
    Route::resource('/booking', brsReservationController::class);

    Route::get('/payment', [brsPaymentController::class, 'index'])->name('payment');

    Route::get('/available-bus', function () {
        return view('brsListofBus');
    });

    Route::get('/history', [brsHistoryController::class, 'index'])->name('history');
});

Route::get('/booking', function () {
    return view('brsBooking');
});

Route::get('/admin', function () {
    return view('brsAdminDashboard');
});





