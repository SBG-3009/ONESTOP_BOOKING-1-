<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    protected $fillable = [
        'status_id',
        'sport_field_id',
        'start_date',
        'end_date',
        'users_id',
        'total'
    ];
    public $timestamps = false;

    public function sportField(){
        return $this->hasOne(SportField::class, 'id', 'sport_field_id');
    }
    public function getUser(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function myBooking(){
        return $this->hasOne(Booking::class, 'id', 'total');
    }
}

