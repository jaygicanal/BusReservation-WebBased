<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brsLoginController;
use App\Http\Controllers\brsAdminController;
use App\Http\Controllers\brsRegistrationController;

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

Route::get('/admin', [brsAdminController::class, 'admin'])->name('brsAdmin');

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
