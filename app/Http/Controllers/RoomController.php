<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::latest()->paginate(5);
        return view('rooms.index',compact('rooms'))-with('i',(request()->input('page',1)-1)+5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_number'=>'required',
            'is_available'=>'required',
            'gas_bill'=>'required',
            'internet_bill'=>'required',
            'dish_bill'=>'required',
            'water_bill'=>'required',
            'dust_bill'=>'required',   
        ]);
        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success','Room created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number'=>'required',
            'is_available'=>'required',
            'gas_bill'=>'required',
            'internet_bill'=>'required',
            'dish_bill'=>'required',
            'water_bill'=>'required',
            'dust_bill'=>'required',   
        ]);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success','Room update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success','Room deleted successfully');
    }
}
