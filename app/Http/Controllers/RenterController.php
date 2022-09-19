<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use App\Models\Office;
use App\Models\Home;
use Illuminate\Http\Request;

class RenterController extends Controller
{

    public function index()
    {
        $renters = Renter::latest()->paginate(5);
        return view('renters.index',compact('renters'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $data = Office::all();
        $home = Home::all();
        return view('renters.create',['data'=>$data,'home'=>$home]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'home_id'=>'required',
        ]);
        Renter::create($request->all());
        return redirect()->route('renters.index')->with('success','Renter create successfully');
        
    }

    public function show(Renter $renter)
    {
        return view('renters.show',compact('renter'));
    }

    public function edit(Renter $renter)
    {
        $data = Office::all();
        $home = Home::all();
        return view('renters.edit',compact('renter','data','home'));
    }

    public function update(Request $request, Renter $renter)
    {
        $request->validate([
            'name'=>'required',
            'phone_1'=>'required',
            'gender'=>'required',
            'home_id'=>'required',
        ]);
        $renter-> update($request->all());
        return redirect()->route('renters.index')->with('success','Renter updated successfully');
    }

    public function destroy(Renter $renter)
    {
        $renter->delete();
        return redirect()->route('renters.index')->with('success','Renter deleted successfully');
    }
}
