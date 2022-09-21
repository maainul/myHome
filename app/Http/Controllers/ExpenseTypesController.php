<?php

namespace App\Http\Controllers;

use App\Models\ExpenseTypes;
use Illuminate\Http\Request;

class ExpenseTypesController extends Controller
{

    public function index()
    {
        $ex_typs = ExpenseTypes::latest()->paginate(5);
        return view('ex_typs.index',compact('ex_typs'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('ex_typs.create');
    }

    public function store(Request $request)
    {
        $request-> validate([
            'ex_typ_name'=> 'required',
        ]);
        ExpenseTypes::create($request->all());
        return redirect()->route('ex_typs.index')->with('success','Expense Type created successfully.');
    }

    public function show(ExpenseTypes $expenseTypes)
    {
        return view('ex_typs.show',compact('expenseTypes'));
    }

    public function edit(ExpenseTypes $expenseTypes)
    {
        return view('ex_typs.edit',compact('expenseTypes'));
    }

    public function update(Request $request, ExpenseTypes $expenseTypes)
    {
        $request->validate([
            'ex_typ_name'=>'required',
        ]);
        
        $expenseTypes -> update($request->all());
        return redirect()->route('ex_typs.index')->with('success','Expense Type Edited successfully.');
    }

    public function destroy(ExpenseTypes $expenseTypes)
    {
        $expenseTypes->delete();
        return redirect()->route('ex_typs.index')->with('success','Expense Type deleted successfully');
    }
}
