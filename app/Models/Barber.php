<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Barber extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = "barbers";
    protected $guard = 'web_barber';

    protected $fillable = [
        'email',
        'name',
        'phone_number',
        'password',
        'image',
        'rate',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
