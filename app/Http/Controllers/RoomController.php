<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Renter;
use App\Models\Room;
use App\Models\Home;
use App\Models\Floor;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')
            ->join('homes', 'homes.id', '=', 'rooms.home_id')
            ->join('floors', 'floors.id', '=', 'rooms.floor_id')
            ->where('rooms.created_by', '=', Auth::user()->id)
            ->select('rooms.*', 'homes.*', 'floors.*')
            ->get();
        $roomRent = Room::sum('room_rent');
        $countRentersByRoom = 10;
        // $countRentersByRoom = Renter::where('created_by', Auth::user()->id)->where('room_id', 1)->count();
        return view('rooms.index', compact('rooms', 'roomRent', 'countRentersByRoom'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data = Floor::where('created_by', Auth::user()->id)->get();
        $home = Home::where('created_by', Auth::user()->id)->get();
        return view('rooms.create', ['data' => $data, 'home' => $home]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|max:20',
            'room_rent' => 'required',
            'floor_id' => 'required',
            'home_id' => 'required',
        ]);
        $room = new Room;
        $room->room_number = $request->room_number;
        $room->room_rent = $request->room_rent;
        $room->floor_id = $request->floor_id;
        $room->home_id = $request->home_id;
        $room->room_rent = $request->room_rent;
        $room->gas_bill = $request->gas_bill;
        $room->internet_bill = $request->internet_bill;
        $room->dish_bill = $request->dish_bill;
        $room->water_bill = $request->water_bill;
        $room->dust_bill = $request->dust_bill;
        $room->created_by = Auth::user()->id;
        $room->save();
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        $renters = DB::table('renters')
            ->select('renters.*')
            ->where('room_id', $room->id)
            ->get();
        $countRentersByRoom = Renter::where('room_id', $room->id)->count();
        return view('rooms.show', compact('room', 'renters', 'countRentersByRoom'));
    }

    public function edit(Room $room)
    {
        $data = Floor::all();
        $home = Home::all();
        return view('rooms.edit', compact('room', 'data', 'home'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|max:20',
            'room_rent' => 'required',
            'floor_id' => 'required',
            'home_id' => 'required',
        ]);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room update successfully');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }
}
