<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brsLoginController;
use App\Http\Controllers\brsAdminController;
use App\Http\Controllers\brsRegistrationController;
use App\Http\Controllers\brsSchedulingController;

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

Route::get('/', function () {
    return view('brsLandingPage');
});

Route::get('/login', [brsLoginController::class, 'index'])->name('login');
Route::post('user-login', [brsLoginController::class, 'userlogin'])->name('user.login');
Route::get('sign-out', [brsLoginController::class, 'signOut'])->name('user.signout');

Route::get('/admin-login', [brsAdminController::class, 'admin'])->name('brsAdmin');

Route::resource('register', brsRegistrationController::class);

Route::group([ 'middleware' => ['auth']], function () {
    Route::get('/', [brsLoginController::class, 'dashboard'])->name('dashboard');

    Route::get('/available-bus', function () {
        return view('brsListofBus');
    });

    Route::get('/payment', function () {
        return view('brsPayment');
    });
});

Route::get('/booking', function () {
    return view('brsBooking');
});

Route::get('/admin', function () {
    return view('brsAdminDashboard');
});

Route::get('/forecasting', function () {
    return view('brsForecasting');
});

Route::get('/scheduling', [brsSchedulingController::class, 'index'])->name('scheduling');
Route::resource('schedule', brsSchedulingController::class);


