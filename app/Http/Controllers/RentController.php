<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Renters;
use App\Models\Rent;
use App\Models\Home;
use App\Models\Room;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $renters = DB::table('renters')
                    ->where('rent_payer',1)
                    ->select('renters.*')
                    ->get();
        foreach ($renters as $r) {
            // echo($r->rent_from);
            $rents = DB::table('renters')
                    // ->select(MONTHNAME($r->rent_from))
                    ->get();
            // dd($rents);
                 
        }
        // dd($renters);
        return view('rents.index',compact('renters'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $homes = Home::where('created_by','=',Auth::user()->id)->get();
        $rooms = DB::table('rooms')
                    ->where('rooms.created_by','=',Auth::user()->id)
                    ->join('homes','rooms.home_id','=','homes.id')
                    ->select('rooms.*','homes.*')
                    ->get();
        return view('rents.create',['rooms'=>$rooms,'homes'=>$homes]);
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
