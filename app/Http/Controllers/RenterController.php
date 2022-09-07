<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use Illuminate\Http\Request;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renters = Renter::latest()->paginate(5);
        return view('renters.index',compact('renters'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('renters.create');
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
            'name'=>'required',
            'email'=>'required',
            'phone_1'=>'required',
            'number_of_members'=>'required',
            'salary'=>'required',
            'gender'=>'required',
        ]);
        Renter::create($request->all());
        return redirect()->route('renters.index')->with('success','Renter create successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function show(Renter $renter)
    {
        return view('renters.show',compact('renter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function edit(Renter $renter)
    {
        return view('renters.edit',compact('renter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renter $renter)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_1'=>'required',
            'number_of_members'=>'required',
            'salary'=>'required',
            'gender'=>'required',
        ]);
        $renter-> update($request->all());
        return redirect()->route('renters.index')->with('success','Renter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renter $renter)
    {
        $renter->delete();
        return redirect()->route('renters.index')->with('success','Renter deleted successfully');
    }
}
