<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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
    return view('public.landing-page');
});

Route::get('/home', function () {
    return view('public.landing-page');
});

Route::get('/testb', function(){
    return view('public.landing-page');
});

Route::get('/schedule', [App\Http\Controllers\HomeController::class, 'schedule']);
Route::post('/schedule/store', [App\Http\Controllers\HomeController::class, 'store']);

Route::get('/badminton', [App\Http\Controllers\HomeController::class, 'badminton']);

Route::get('/futsal', [App\Http\Controllers\HomeController::class, 'futsal']);

Route::resource('admin', App\Http\Controllers\AdminController::class)->middleware('role:admin');

Route::resource('user', App\Http\Controllers\UserController::class)->middleware('role:customer');

Route::resource('court', App\Http\Controllers\CourtController::class)->middleware('role:admin');

Route::get('/booking/my-booking', [App\Http\Controllers\BookingController::class, 'myBooking']);

Route::get('/booking/manage-booking', [App\Http\Controllers\BookingController::class,'manageBooking'])->name('manage-booking')->middleware('role:admin');

Route::post('/booking/search', [App\Http\Controllers\BookingController::class, 'search']);

Route::resource('booking', App\Http\Controllers\BookingController::class);

Route::get('/show/{id}', [App\Http\Controllers\BookingController::class, 'show']);

Auth::routes();



Route::get('/testA', [App\Http\Controllers\HomeController::class, 'testA']);
Route::get('/homeA',[App\Http\Controllers\HomeController::class,'index'])->name('homeA');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');

Route::get('/managebooking-customer', [App\Http\Controllers\HomeController::class,'customerDashboard']);

Route::get('/stripe-payment', [App\Http\Controllers\StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [App\Http\Controllers\StripeController::class, 'handlePost'])->name('stripe.payment');

