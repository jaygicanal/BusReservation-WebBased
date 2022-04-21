<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\UserAuth;

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

Route::get('/', function () {
    return view('brsLandingPage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\brsLoginController::class, 'login'])->name('brsLogin');

Route::get('/admin', [App\Http\Controllers\brsAdminController::class, 'admin'])->name('brsAdmin');

Route::get('/available-bus', function () {
    return view('brsListofBus');
});

Route::get('/payment', function () {
    return view('brsPayment');
});

