<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(Farm $farm)
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $expenses = Expense::where('farm_id', $farmId)->get();
        return view('expenses.index', compact('expenses'));
    }

    public function create(Farm $farm)
    {
        return view('expenses.create', compact('farm'));
    }

    public function store(Request $request, Farm $farm)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $user = Auth::user();
        $farmId = $user->farm_id;

        $expense = new Expense($request->all());
        $expense->farm_id = $farmId;
        $expense->save();
        return redirect()->route('expenses.index', [$farm])->with('success', 'Expense registered successfully.');
    }

    public function show(Expense $expense)
    {
        $farm = $expense->farm;
        return view('expenses.show', compact('expense','farm'));
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses.index',[$expense->farm])->with('success', 'Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        $farm = $expense->farm;
        $expense->delete();
        return redirect()->route('expenses.index',[$farm])->with('success', 'Expense deleted successfully.');
    }
}
