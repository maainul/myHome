<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Renter;
use App\Models\Room;
use App\Models\Office;
use App\Models\Home;
use Illuminate\Http\Request;

class RenterController extends Controller
{

    public function index()
    {
        // $renters = Renter::latest()->paginate(5);
        $renters = DB::table('renters')
            ->join('offices', 'renters.office_id', '=', 'offices.id')
            ->join('homes', 'renters.home_id', '=', 'homes.id')
            ->select('renters.*', 'offices.office_name', 'homes.home_name')
            ->get();
        // dd($renters);
        return view('renters.index',compact('renters'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $data = Office::all();
        $home = Home::all();
        $rms = Room::all();
        return view('renters.create',['data'=>$data,'home'=>$home,'rms'=>$rms]);
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
        $rms = Room::all();
        return view('renters.edit',compact('renter','data','home','rms'));
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
