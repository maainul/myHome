<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
    1 = super admin
    2 = admin
    0 = user
*/

class IndexController extends Controller
{
    public function index(){
        $role = Auth::user()->role;
        if ($role=="1"){
            return view('superadmin');
        }
        else if ($role == "2"){
            return view('admin');
        }else{
            return view('renter');
        }
    }
}
