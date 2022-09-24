<?php

namespace App\Http\Controllers;
use DB;
// use Intervention\Image\Facades\Image as Image;
use Image;
use App\Models\Renter;
use App\Models\Room;
use App\Models\Office;
use App\Models\Home;
use Illuminate\Http\Request;

class RenterController extends Controller
{

    public function index()
    {
        $renters = DB::table('renters')
            ->join('offices', 'renters.office_id', '=', 'offices.id')
            ->join('homes', 'renters.home_id', '=', 'homes.id')
            ->select('renters.*', 'offices.office_name', 'homes.home_name')
            ->get();
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
            'renter_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gender'=>'required',
            'home_id'=>'required',
        ]);
        $person  = new Renter ;
        $person->name = $request->name;
        $person->email = $request->email;
        $person->fb_id = $request->fb_id;
        $person->home_id = $request->home_id;
        $person->phone_1 = $request->phone_1;
        $person->phone_2 = $request->phone_2;
        $person->office_id = $request->office_id;
        $person->salary = $request->salary;
        $person->designation = $request->designation;
        $person->address = $request->address;
        $person->gender = $request->gender;
        $person->nid = $request->nid;
        $person->birthdate = $request->birthdate;
        $person->rent_from = $request->rent_from;
        $person->status = '1';
        if($request->hasFile('renter_image')){
          $image = $request->file('renter_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('public/image/' . $filename);
          $person->renter_image = $filename;
          $person->save();
        };
        $person->save();
        return redirect()->route('renters.index')->with('success','Renter created successfully.');
        
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
