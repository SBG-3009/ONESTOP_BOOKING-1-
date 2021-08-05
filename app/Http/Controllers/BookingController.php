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
    public function update(Request $request, $id) {
        $booking = SportField::find($id);
        $booking->name = $request->name;
        $booking->price = $request->price;
        $booking->start_time = $request->start_time;
        $booking->end_time = $request->end_time;
        $booking->sport_location_id = $request->sport_location_id;
        $booking->save();
        $bookings = SportField::with('sportLocation')->get();
        $sportsLocation = SportsLocation::get();
        return view('managebooking', ['message'=> 'Record Is Successfully Updated'], compact('bookings', 'sportsLocation'));
    
    }
    function showA()
    {
        $bookings = SportField::with('sportsLocation')->get();
        $sportLocation = SportsLocation::get();
        //dd($bookings);
        return view('managebooking', compact('bookings', 'sportLocation'));
    }
  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::destroy($id);
        $bookings = SportField::with('sportsLocation')->get();
        $sportsLocation = SportsLocation::get();
        return view('manageCourt', ['message'=> 'Record Is Deleted'], compact('bookings', 'sportsLocation'));
    }
}