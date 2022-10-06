<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $homes = DB::table('homes')
        ->select('homes.*')
        ->where('created_by','=',Auth::user()->id)
        ->get();
        return view('homes.index',compact('homes'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('homes.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'home_name' => 'required|max:50',
            'address' => 'max:300',
        ]);
        $home  = new Home ;
        $home->home_name = $request->home_name;
        $home->address = $request->address;
        $home->created_by = Auth::user()->id;
        $home->save();
        return redirect()->route('homes.index')->with('success','Home created successfully.');
    }

    public function show(Home $home)
    {
        return view('homes.show',compact('home'));
    }

    public function edit(Home $home)
    {
        return view('homes.edit',compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'home_name' => 'required|max:50',
            'address' => 'max:300',
        ]);

        $home -> update($request->all());
        return redirect()->route('homes.index')->with('success','Home updated successfully');
    }

    public function destroy(Home $home)
    {
        $home->delete();
        return redirect()->route('homes.index')->with('success','Home deleted successfully');
    }
}
