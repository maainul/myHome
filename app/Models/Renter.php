<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    protected $fillable = [   
        'name',
        'email',
        'fb_id',
        'office_id',
        'home_id',
        'home_name',
        'phone_1',
        'phone_2',
        'number_of_members',
        'salary',
        'designation',
        'address',
        'gender',
        'nid',
        'birthdate',
        'status'
    ];
    // public function office(){
    //     return $this->belongsTo(Post::class);
    // }
}