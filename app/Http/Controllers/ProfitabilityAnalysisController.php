<?php

namespace App\Http\Controllers;

use App\Models\ProfitabilityAnalysis;
use App\Models\Farm;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfitabilityAnalysisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $farm = Farm::where('id', $farmId)->first();

        $incomes = Income::where('farm_id', $farmId)->get();
        $totalIncome = $incomes->sum('amount');

        $expenses = Expense::where('farm_id', $farmId)->get();
        $totalExpenses = $expenses->sum('amount');

        $netProfit = $totalIncome - $totalExpenses;

        $reportData = [
            'farmName' => $farm->name,
            'incomes' => $incomes,
            'totalIncome' => $totalIncome,
            'expenses' => $expenses,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
        ];

        return view('analyses.index', compact('reportData'));
    }


    public function create(Farm $farm)
    {
        return view('analyses.create', compact('farm'));
    }

    public function store(Request $request, Farm $farm)
    {
        $request->validate([
            'total_income' => 'required|numeric',
            'total_expenses' => 'required|numeric',
            'net_profit' => 'required|numeric',
        ]);

        $analysis = new ProfitabilityAnalysis($request->all());
        $analysis->farm_id = $farm->id;
        $analysis->save();

        return redirect()->route('analyses.index', [$farm])->with('success', 'Profitability analysis created successfully.');
    }

    public function edit(ProfitabilityAnalysis $analysis)
    {
        return view('analyses.edit', compact('analysis'));
    }

    public function update(Request $request, ProfitabilityAnalysis $analysis)
    {
        $request->validate([
            'total_income' => 'required|numeric',
            'total_expenses' => 'required|numeric',
            'net_profit' => 'required|numeric',
        ]);

        $analysis->update($request->all());

        return redirect()->route('analyses.index', [$analysis->farm])->with('success', 'Profitability analysis updated successfully.');
    }

    public function destroy(ProfitabilityAnalysis $analysis)
    {
        $farm = $analysis->farm;
        $analysis->delete();
        return redirect()->route('analyses.index', [$farm])->with('success', 'Profitability analysis deleted successfully.');
    }
}
