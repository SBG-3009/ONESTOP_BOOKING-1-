<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookStatus;
use App\Models\SportField;
use App\Models\SportsLocation;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courts = SportField::with('sportsLocation')->get();
        $sportsLocation = SportsLocation::get();
        return view('manageCourt', compact('courts', 'sportsLocation'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SportField::create($request->all());
        $courts = SportField::get();
        $sportsLocation = SportsLocation::get();
        return view('manageCourt', ['message'=> 'Record Is Successfully Created'], compact('courts', 'sportsLocation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $court = SportField::find($id);
        $court->name = $request->name;
        $court->description = $request->description;
        $court->price = $request->price;
        $court->start_time = $request->start_time;
        $court->end_time = $request->end_time;
        $court->sport_location_id = $request->sport_location_id;
        $court->save();
        $courts = SportField::with('sportLocation')->get();
        $sportsLocation = SportsLocation::get();
   
        return view('manageCourt', ['message'=> 'Record Is Successfully Updated '], compact('courts', 'sportsLocation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SportField::destroy($id);
        $courts = SportField::with('sportsLocation')->get();
        $sportsLocation = SportsLocation::get();
        return view('manageCourt', ['message'=> 'Record Is Deleted'], compact('courts', 'sportsLocation'));
    }
}
