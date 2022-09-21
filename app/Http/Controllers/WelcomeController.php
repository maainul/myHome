<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Room;
use App\Models\Renter;
class WelcomeController extends Controller
{
    public function index()
    {
        $totalExpense = Expense::sum('amount');
        $totalRoom = Room::count(); 
        $totalNonRentRoom = Room::count(); 
        $totalRenter = Renter::count(); 
        $totalActiveRenter = Renter::where('status','1')->count(); 
        $totalMaleRenter=Renter::where('gender','1')->count();
        $totalFemaleRenter=Renter::where('gender','2')->count();
        return view('welcome.index',compact('totalExpense','totalRoom','totalRenter','totalActiveRenter','totalMaleRenter','totalFemaleRenter','totalNonRentRoom'));
    }
}
