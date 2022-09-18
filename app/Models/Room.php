<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'status',
        'gas_bill',
        'internet_bill',
        'dish_bill',
        'water_bill',
        'dust_bill',
    ];
}
