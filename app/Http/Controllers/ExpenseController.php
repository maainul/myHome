<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Expense;
use App\Models\Home;
use App\Models\ExpenseTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExpenseController extends Controller
{

    public function index()
    {
        $expenses = DB::table('expenses')
            ->join('expense_types', 'expense_types.id', '=', 'expenses.expense_type')
            ->join('homes', 'homes.id', '=', 'expenses.home_id')
            ->select('expenses.*', 'homes.*', 'expense_types.*')
            ->where('expenses.created_by', '=', Auth::user()->id)
            ->get();
        $totalExpense = $total = Expense::sum('amount');
        return view('expenses.index', compact('expenses', 'totalExpense'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data = ExpenseTypes::where('created_by', '=', Auth::user()->id)->get();
        $home = Home::where('created_by', '=', Auth::user()->id)->get();
        return view('expenses.create', ['data' => $data, 'home' => $home]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_type' => 'required',
            'expense_name' => 'required|max:50|min:3',
            'amount' => 'required',
            'ex_date' => 'required',
            'home_id' => 'required',
        ]);
        $expense = new Expense;
        $expense->expense_type = $request->expense_type;
        $expense->ex_des = $request->ex_des;
        $expense->expense_name = $request->expense_name;
        $expense->amount = $request->amount;
        $expense->ex_date = $request->ex_date;
        $expense->home_id = $request->home_id;
        $expense->status = 1;
        $expense->expense_type = $request->expense_type;
        $expense->created_by = Auth::user()->id;
        $expense->save();
        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $data = ExpenseTypes::where('created_by', '=', Auth::user()->id)->get();
        $home = Home::where('created_by', '=', Auth::user()->id)->get();
        return view('expenses.edit', compact('expense', 'data', 'home'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'expense_type' => 'required',
            'expense_name' => 'required',
            'amount' => 'required',
            'ex_date' => 'required',
            'home_id' => 'required',
        ]);
        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success', 'Expense Edited successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }

    public function getByExpenseType()
    {
        $expenses = DB::table('expenses')
            ->join('expense_types', 'expense_types.id', '=', 'expenses.expense_type')
            ->join('homes', 'homes.id', '=', 'expenses.home_id')
            ->select('expenses.*', 'expense_types.ex_typ_name', 'homes.home_name', DB::raw('SUM(amount) as total_amount'))
            ->where('expenses.created_by', '=', Auth::user()->id)
            ->groupBy('expense_type')
            ->get();
        return view('expenses.getByExType', compact('expenses'));
    }
    public function showAllByExpenseType($ex_type_id)
    {
        $expenses = DB::table('expenses')
            ->join('expense_types', 'expense_types.id', '=', 'expenses.expense_type')
            ->join('homes', 'homes.id', '=', 'expenses.home_id')
            ->select('expenses.*', 'expense_types.ex_typ_name', 'homes.home_name')
            ->where('expenses.created_by', '=', Auth::user()->id)
            ->where('expenses.expense_type', $ex_type_id)
            ->get();
        return view('expenses.showAllByExpenseType', compact('expenses'));
    }
}
