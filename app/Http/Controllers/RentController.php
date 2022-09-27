<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Room;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(5);
        return view('rents.index',compact('rooms'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('rents.create');
    }

    public function store(Request $request)
    {
        $request-> validate([
            'rent_amount'=> 'required',
            'rent_month'=> 'required',
            'rent_given_date'=> 'required', 
        ]);
        Rent::create($request->all());
        return redirect()->route('rents.index')->with('success','Rent given successfully.');
    }
}
