<?php

namespace App\Http\Controllers;


use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Transaction;
use App\Models\SportField;
use App\Models\SportsLocation;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    function index() {
        $type = 'Badminton';

        $dropdown = SportsLocation::where('sport_types', $type)->get();
        $resources = SportField::get();
        return view('schedule',
        ['resources'=> $resources],['type'=> 'Badminton']
        )->with('dropdown', $dropdown);
    }

    // public function homeA() {
    //     $type = 'Badminton';

    //     $dropdown = SportsLocation::where('sport_types', $type)->get();
    //     $resources = SportField::get();
    //     return view('schedule',
    //     ['resources'=> $resources],['type'=> 'Badminton']
    //     )->with('dropdown', $dropdown);
    // }


    public function store(Request $request){
        $type = $request->type;
        $resources = SportField::get();
        $booking = Booking::create(array_merge($request->all(), ['status_id' => 2]));
        $dropdown = SportsLocation::where('sport_types', $type)->get();


        // Booking::create($request->all());
        // dd($type);
        $courtReferenceNo = 'ABC00'.$booking->id;
        return view('schedule',
            ['message' =>'successfully created '.$courtReferenceNo],
            ['resources'=> $resources],
            ['type' => $type]
        )->with('dropdown', $dropdown);

    }

    public function badminton() {
        $dropdown = SportsLocation::where('sport_types', 'Badminton')->get();
        $resources = SportField::where('sport_location_id', 1)->get(); 
        $from = date('Y-m-d');
        $to = date('Y-m-d',strtotime('+7 day',strtotime($from)));
        $events = Booking::whereBetween('start_date',[$from,$to])->get();
        //return $events;
        return view('schedule', ['events'=> $events],['resources'=> $resources],['type'=> 'Badminton'])->with('dropdown', $dropdown);
    }

    public function futsal() {
        $dropdown = SportsLocation::where('sport_types', 'Futsal')->get();
        $resources = SportField::where('sport_location_id', 2)->get();
        return view('schedule', ['resources'=> $resources],['type'=> 'Futsal'])->with('dropdown', $dropdown);
    }

    public function testA(Request $request) {
    //echo $request->type;
    $type = $request->type;
    $dropdown = SportsLocation::where('sport_types', $type)->get();
    $resources = SportField::where('sport_location_id', $request->id)->get();
    return view('schedule', ['resources'=> $resources], ['type'=> $type])->with('dropdown', $dropdown);
    }


    public function admin() {
        return view('admin');
    }

    public function customerDashboard(){
        $bookings = Booking::where('users_id', auth()->id())->with('sportField')->get();
        $sportFields = SportField::get();
        return view('managebooking-customer', compact('bookings', 'sportFields'));
    }
}
