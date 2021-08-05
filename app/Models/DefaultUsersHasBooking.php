<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultUsersHasBooking extends Model
{
    use HasFactory;

    protected $fillable =[
        'users_id',
        'booking_id',
    ];
}
