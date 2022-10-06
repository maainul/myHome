<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{

    public function index()
    {
        $offices = Office::where('created_by','=',Auth::user()->id)->get();
        return view('offices.index',compact('offices'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'office_name'=>'required|max:50',
            'address'=>'required|max:300',
        ]);
        $office = new Office;
        $office->office_name = $request->office_name;
        $office->address = $request->address;
        $office->created_by = Auth::user()->id;
        $office->save();
        return redirect()->route('offices.index')->with('success','Office created success.');
    }

    public function show(Office $office)
    {
        return view('offices.show',compact('office'));
    }

    public function edit(Office $office)
    {
        return view('offices.edit',compact('office'));
    }

    public function update(Request $request, Office $office)
    {
        $request->validate([
            'office_name'=>'required|max:50',
            'address'=>'required|max:300',
        ]);
        $office -> update($request->all());
        return redirect()->route('offices.index')->with('success','Office updated successfully');
    }

    public function destroy(Office $office)
    {
        $office->delete();
        return redirect()->route('offices.index')->with('success','Office deleted successfully');
    }
}
