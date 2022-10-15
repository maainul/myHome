<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [  
        'room_id',
        'home_id',
        'renter_id',
        'created_by',
        'rent_amount',
        'rent_month',
        'rent_given_date', 
        'status', 
    ];
}
