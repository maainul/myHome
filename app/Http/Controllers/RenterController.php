<?php

namespace App\Http\Controllers;
use DB;
use Image;
use App\Models\Renter;
use App\Models\Room;
use App\Models\Office;
use App\Models\Floor;
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
            'name'=>'required|max:50',
            'renter_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gender'=>'required',
            'home_id'=>'required',
            'office_id'=>'required',
            'room_id'=>'required',
        ]);
        $renter  = new Renter ;
        $renter->name = $request->name;
        $renter->email = $request->email;
        $renter->e_back = $request->e_back;
        $renter->notes = $request->notes;
        $renter->fb_id = $request->fb_id;
        $renter->home_id = $request->home_id;
        $renter->room_id = $request->room_id;
        $renter->phone_1 = $request->phone_1;
        $renter->phone_2 = $request->phone_2;
        $renter->office_id = $request->office_id;
        $renter->salary = $request->salary;
        $renter->designation = $request->designation;
        $renter->address = $request->address;
        $renter->gender = $request->gender;
        $renter->nid = $request->nid;
        $renter->birthdate = $request->birthdate;
        $renter->rent_from = $request->rent_from;
        $renter->status = '1';
        if($request->hasFile('renter_image')){
          $image = $request->file('renter_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('public/image/' . $filename);
          $renter->renter_image = $filename;
          $renter->save();
        };
        // update status of room 
        $room = Room::findOrFail($request->room_id);
        $room->status = '1';
        $room->save();
        $renter->save();
        return redirect()->route('renters.index')->with('success','Renter created successfully.');
        
    }

    public function show(Renter $renter)
    {
        $renter = DB::table('renters')
                    ->join('offices', 'renters.office_id', '=', 'offices.id')
                    ->join('homes', 'renters.home_id', '=', 'homes.id')
                    ->join('rooms', 'renters.room_id', '=', 'rooms.id')
                    ->select('renters.*', 'offices.office_name', 'homes.home_name','rooms.*')
                    ->where('renters.id',$renter->id)
                    ->get();
        $floor= Floor::findOrFail($renter[0]->floor_id);
        return view('renters.show',compact('renter','floor'));
    }

    public function edit(Renter $renter)
    {
        $office = Office::all();
        $home = Home::all();
        $rms = Room::all();
        return view('renters.edit',compact('renter','office','home','rms'));
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

    public function getByGender($gender_id)
    {
        $renters = DB::table('renters')
                    ->join('offices', 'renters.office_id', '=', 'offices.id')
                    ->join('homes', 'renters.home_id', '=', 'homes.id')
                    ->join('rooms', 'renters.room_id', '=', 'rooms.id')
                    ->select('renters.*', 'offices.office_name', 'homes.home_name','rooms.*')
                    ->where('gender',$gender_id)
                    ->get();
        return view('renters.index',compact('renters'));
    }
}
