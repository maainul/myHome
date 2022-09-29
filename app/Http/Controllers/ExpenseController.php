<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Expense;
use App\Models\Home;
use App\Models\ExpenseTypes;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function index()
    {
        $expenses = DB::table('expenses')
        ->join('expense_types','expense_types.id','=','expenses.expense_type')
        ->join('homes','homes.id','=','expenses.home_id')
        ->select('expenses.*','homes.*','expense_types.*')
        ->get();
        $totalExpense = $total = Expense::sum('amount');
        return view('expenses.index',compact('expenses','totalExpense'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $data = ExpenseTypes::all();
        $home = Home::all();
        return view('expenses.create',['data'=>$data,'home'=>$home]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_type'=>'required',
            'expense_name'=>'required|max:50',
            'amount'=>'required',
            'ex_date'=>'required',
            'home_id'=>'required',
        ]);
        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success','Expense created successfully.');
    }

    public function show(Expense $expense)
    {
        return view('expenses.show',compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $data = ExpenseTypes::all();
        $home = Home::all();
        return view('expenses.edit',compact('expense','data','home'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
        'expense_type'=>'required',
        'expense_name'=>'required',
        'amount'=>'required',
        'ex_date'=>'required',
        'home_id'=>'required',
    ]);
    $expense -> update($request->all());
    return redirect()->route('expenses.index')->with('success','Expense Edited successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success','Expense deleted successfully');
    }
}
