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
        'home_id',
        'floor_id',
        'created_by',
        // 'internet_bill',
        // 'water_bill',
        // 'dust_bill',
    ];
}
