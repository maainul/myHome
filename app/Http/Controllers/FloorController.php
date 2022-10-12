<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Floor;
use App\Models\Home;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    
    public function index()
    {
        $floors = DB::table('floors')
                ->join('homes','homes.id','=','floors.home_id')
                ->where('floors.created_by','=',Auth::user()->id)
                ->select('floors.*','homes.home_name')
                ->get();
        return view('floors.index',compact('floors'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $home = Home::where('created_by','=',Auth::user()->id)->get();
        return view('floors.create',['home'=>$home]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'floor_number' => 'required|max:10|unique:floors,floor_number',
            'home_id' => 'required',
        ]);
        $floor = new Floor;
        $floor-> floor_number = $request->floor_number;
        $floor-> home_id = $request->home_id;
        $floor-> created_by = Auth::user()->id;
        $floor->save();
        return redirect()->route('floors.index')->with('success','Floor created successfully.');
    }

    public function show(Floor $floor)
    {
        return view('floors.show',compact('floor'));
    }

    public function edit(Floor $floor)
    {
        $home = Home::where('created_by','=',Auth::user()->id)->get();
        return view('floors.edit',compact('floor','home'));
    }

    public function update(Request $request, Floor $floor)
    {
        $request->validate([
            'floor_number' => 'required|max:10',
            'home_id' => 'required',
        ]);

        $floor -> update($request->all());
        return redirect()->route('floors.index')->with('success','Floor updated successfully');
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();
        return redirect()->route('floors.index')->with('success','Floor deleted successfully');
    }
}
