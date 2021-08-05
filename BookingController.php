<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Transaction;
use App\Models\BookStatus;
use App\Models\SportField;
use App\Models\SportsLocation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    function show()
    {
        $data= Booking::all();
        return view('managebooking',['bookings'=>$data]);
        
    }
}