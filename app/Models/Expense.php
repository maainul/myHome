<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'expense_type',
        'expense_name',
        'home_id',
        'created_by',
        'ex_des',
        'amount',
        'ex_date',
        'status',
    ];
}
