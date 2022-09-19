<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::latest()->paginate(5);
        return view('homes.index',compact('homes'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('homes.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
        ]);
        Home::create($request->all());
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
            'name' => 'required',
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
