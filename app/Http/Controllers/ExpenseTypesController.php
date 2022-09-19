<?php

namespace App\Http\Controllers;

use App\Models\ExpenseTypes;
use Illuminate\Http\Request;

class ExpenseTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ex_typs = ExpenseTypes::latest()->paginate(5);
        return view('ex_typs.index',compact('ex_typs'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ex_typs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'name'=> 'required',
        ]);
        ExpenseTypes::create($request->all());
        return redirect()->route('ex_typs.index')->with('success','Expense Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseTypes  $expenseTypes
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseTypes $expenseTypes)
    {
        return view('ex_typs.show',compact('expenseTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseTypes  $expenseTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseTypes $expenseTypes)
    {
        return view('ex_typs.edit',compact('expenseTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseTypes  $expenseTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseTypes $expenseTypes)
    {
        $request->validate([
            'name'=>'required',
        ]);
        
        $expenseTypes -> update($request->all());
        return redirect()->route('ex_typs.index')->with('success','Expense Type Edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseTypes  $expenseTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseTypes $expenseTypes)
    {
        $expenseTypes->delete();
        return redirect()->route('ex_typs.index')->with('success','Expense Type deleted successfully');
    }
}
