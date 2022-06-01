<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brsLoginController;
use App\Http\Controllers\brsRegistrationController;
use App\Http\Controllers\brsReservationController;
use App\Http\Controllers\brsPaymentController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\brsSchedulingController;
use App\Http\Controllers\Auth\brsRoutingController;
use App\Http\Controllers\Auth\brsBookedController;

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
    Route::get('logout/', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AdminRegisterController::class, 'index'])->name('admin.register');
    Route::post('/register', [AdminRegisterController::class, 'store'])->name('admin.register.submit');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/scheduling', [brsSchedulingController::class, 'index'])->name('scheduling');
    Route::resource('/schedule', brsSchedulingController::class);

    Route::resource('/routing', brsRoutingController::class);

    Route::get('/manage-booking', [brsBookedController::class, 'index'])->name('booked');

});

// FOR NORMAL USER REGISTRATION AND LOGIN
Route::get('/login', [brsLoginController::class, 'index'])->name('login');
Route::post('user-login', [brsLoginController::class, 'userlogin'])->name('user.login');
Route::get('sign-out', [brsLoginController::class, 'signOut'])->name('user.signout');
Route::resource('/register', brsRegistrationController::class);



Route::group([ 'middleware' => ['auth']], function () {
    Route::get('/', [brsReservationController::class, 'index'])->name('dashboard');
    Route::get('searchBusSched', [brsReservationController::class, 'search'])->name('search.busschedule');
    Route::resource('/booking', brsReservationController::class);

    Route::get('/payment', [brsPaymentController::class, 'index'])->name('payment');

    Route::get('/available-bus', function () {
        return view('brsListofBus');
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




