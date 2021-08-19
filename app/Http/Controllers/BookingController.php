<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Transaction;
use App\Models\BookStatus;
use App\Models\SportField;
use App\Models\SportsLocation;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $bookings = Booking::query()
            ->where('id', 'LIKE', "%{$search}%")
            
            ->get();
    
        // Return the search view with the resluts compacted
        return view('managebooking', compact('bookings'));
    }




    public function index()
    {
        //
        $bookings = Booking::with('sportField')->get();
        $sportFields = SportField::get();
        // dd($bookings);
        return view('managebooking', compact('bookings', 'sportFields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $booking = Booking::find($id);
        $booking->user = $request->user;
        $booking->status_id = 2;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->sport_field_id = $request->sport_field_id;
        $booking->save();

        $bookings = Booking::with('sportField')->get();
        $sportFields = SportField::get();
        return view('managebooking', ['message'=> 'Record Is Successfully Updated'], compact('bookings', 'sportFields'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Booking::destroy($id);

        $bookings = Booking::with('sportField')->get();
        $sportFields = SportField::get();
        return view('managebooking', ['message'=> 'Record Is Deleted'], compact('bookings', 'sportFields'));
    }
}