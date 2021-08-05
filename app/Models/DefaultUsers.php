<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultUsers extends Model
{
    use HasFactory;
    protected $fillable =[
        'email',
        'password',
        'salt',
        'group_id',
        'ip_address',
        'active',
        'activation_code',
        'created_on',
        'last_login',
        'username',
        'forgotten_password_code',
        'remember_code'
    ];
}
