<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'start_time',
        'end_time',
        'sport_location_id'
    ];

    public $timestamps = false;

    public function sportsLocation(){
        return $this->hasOne(SportsLocation::class, 'id', 'sport_location_id');
    }

}
