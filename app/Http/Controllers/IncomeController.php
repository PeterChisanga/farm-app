<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index(Farm $farm)
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $incomes = Income::where('farm_id', $farmId)->get();
        return view('incomes.index', compact('incomes'));
    }

    public function create(Farm $farm)
    {
        return view('incomes.create', compact('farm'));
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

        $income = new Income($request->all());
        $income->farm_id = $farmId;
        $income->save();

        return redirect()->route('incomes.index', [$farm])->with('success', 'Income registered successfully.');
    }

    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, Income $income)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $income->update($request->all());

        return redirect()->route('incomes.index', [$income->farm])->with('success', 'Income updated successfully.');
    }

    public function destroy(Income $income)
    {
        $farm = $income->farm;
        $income->delete();
        return redirect()->route('incomes.index', [$farm])->with('success', 'Income deleted successfully.');
    }
}
