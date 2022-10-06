<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseTypes extends Model
{
    protected $fillable = ['ex_typ_name','created_by'];
}
