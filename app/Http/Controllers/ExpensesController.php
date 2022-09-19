<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    public function index()
    {
        $expenses = Expenses::latest()->paginate(5);
        return view('expenses.index',compact('expenses'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_type'=>'required',
            'expense_name'=>'required',
            'amount'=>'required',
            'ex_date'=>'required',
        ]);
        Expenses::create($request->all());
        return redirect()->route('expenses.index')->with('success','Expense created successfully.');
    }

    public function show(Expenses $expenses)
    {
        return view('expenses.show',compact('expenses'));
    }

    public function edit(Expenses $expenses)
    {
        return view('expenses.edit',compact('expenses'));
    }

    public function update(Request $request, Expenses $expenses)
    {
        $request->validate([
            'expense_type'=>'required',
            'expenese_name'=>'required',
            'amount'=>'required',
            'ex_date'=>'required',
        ]);
        $expenses -> update($request->all());
        return redirect()->route('expenses.index')->with('success','Expense Edited successfully.');
    }

    public function destroy(Expenses $expenses)
    {
        $expenses->delete();
        return redirect()->route('expenses.index')->with('success','Expense deleted successfully');
    }
}
