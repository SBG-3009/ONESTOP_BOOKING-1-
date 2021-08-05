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
    return view('home');
});


Route::get('/bookingstatus', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/schedule', [App\Http\Controllers\HomeController::class, 'schedule']);
Route::post('/schedule/store', [App\Http\Controllers\HomeController::class, 'store']);


Route::get('/badminton', [App\Http\Controllers\HomeController::class, 'badminton']);
Route::get('/futsal', [App\Http\Controllers\HomeController::class, 'futsal']);
Route::post('/scheduleA', [App\Http\Controllers\HomeController::class, 'scheduleA']);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin']);

Route::post('/create', [App\Http\Controllers\HomeController::class, 'create']);

Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show']);

Route::delete('/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destory']);

// Manage Courts



Route::resource('court', App\Http\Controllers\CourtController::class);

Route::get('/managebooking', [BookingController::class,'show']);