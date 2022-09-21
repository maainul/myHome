<?php

namespace App\Models;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'room_rent',
        'status',
        'home_id',
        'floor_id',
        'gas_bill',
        'dish_bill',
        // 'internet_bill',
        // 'water_bill',
        // 'dust_bill',
    ];
}
