<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\Room;
use App\Models\Renter;
use App\Models\User;
/*
    0 = admin
    1 = super admin
    2 = user
*/

class IndexController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == "1") {
            return view('superadmin');
        } else if ($role == "0") {
            $totalExpense = Expense::sum('amount');
            $totalRoom = Room::count();
            $totalNonRentRoom = Room::count();
            $totalRenter = Renter::count();
            $totalActiveRenter = Renter::where('status', '1')->count();
            $totalMaleRenter = Renter::where('gender', '1')->count();
            $totalFemaleRenter = Renter::where('gender', '2')->count();
            $users = User::count();
            return view('admin', compact('totalExpense','users','totalRoom', 'totalRenter', 'totalActiveRenter', 'totalMaleRenter', 'totalFemaleRenter', 'totalNonRentRoom'));
        } else {
            return view('renter');
        }
    }
}
