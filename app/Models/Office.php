<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'name',
        'address',
    ];
    
    // public function renters(){
    //     return $this->hasMany(Renter::class);
    // }
}
