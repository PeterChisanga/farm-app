<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Farm;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;
// use Maatwebsite\Excel\Facades\Excel;
// use Barryvdh\Snappy\Facades\SnappyPDF;

class ReportController extends Controller
{
    public function index(Farm $farm)
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

        return view('reports.index', compact('reportData'));
    }

    public function downloadCsvProfitReport()
    {
        // Fetch report data
        $reportData = $this->getProfitReportData();

        // Prepare data for Excel export
        $data = [
            'Income Summary' => [
                'headers' => ['Category', 'Amount'],
                'rows' => [],
            ],
            'Expense Summary' => [
                'headers' => ['Category', 'Amount'],
                'rows' => [],
            ],
            'Profitability Analysis' => [
                'total_income' => $reportData['totalIncome'],
                'total_expenses' => $reportData['totalExpenses'],
                'net_profit' => $reportData['netProfit'],
            ],
        ];

        foreach ($reportData['incomes'] as $income) {
            $data['Income Summary']['rows'][] = [$income->category, $income->amount];
        }

        foreach ($reportData['expenses'] as $expense) {
            $data['Expense Summary']['rows'][] = [$expense->category, $expense->amount];
        }

        // Export to Excel using Maatwebsite/Excel package
        // return Excel::download(new ProfitReportExport($data), 'profit_report.xlsx');
    }

    public function downloadPdfProfitReport()
    {
        $reportData = $this->getProfitReportData();

        $pdf = Pdf::loadView('reports.profit_report_pdf',compact('reportData'));
        return $pdf->download('profit-report.pdf');

    }

    public function downloadExpensesPdf()
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $expenses = Expense::where('farm_id', $farmId)->get();
        $totalExpenses = $expenses->sum('amount');

        $reportData = [
            'expenses' => $expenses,
            'totalExpenses' => $totalExpenses
        ];

        $pdf = Pdf::loadView('reports.farm_expenses_report_pdf',compact('reportData'));
        return $pdf->download('farm-expenses-report.pdf');
    }

    public function downloadIncomesPdf()
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $incomes = Income::where('farm_id', $farmId)->get();
        $totalIncomes = $incomes->sum('amount');

        $reportData = [
            'incomes' => $incomes,
            'totalIncomes' => $totalIncomes
        ];

        $pdf = Pdf::loadView('reports.farm_incomes_report_pdf',compact('reportData'));
        return $pdf->download('farm-incomes-report.pdf');
    }

    private function getProfitReportData()
    {
        $user = Auth::user();
        $farmId = $user->farm_id;

        $farm = Farm::where('id', $farmId)->first();

        $incomes = Income::where('farm_id', $farmId)->get();
        $totalIncome = $incomes->sum('amount');

        $expenses = Expense::where('farm_id', $farmId)->get();
        $totalExpenses = $expenses->sum('amount');

        $netProfit = $totalIncome - $totalExpenses;

        return [
            'incomes' => $incomes ,
            'expenses' => $expenses,
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
        ];
    }

    public function create(Farm $farm)
    {
        return view('reports.create', compact('farm'));
    }

    public function store(Request $request, Farm $farm)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'date_generated' => 'required|date',
        ]);

        $report = new Report($request->all());
        $report->farm_id = $farm->id;
        $report->save();

        return redirect()->route('reports.index', [$farm])->with('success', 'Report created successfully.');
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'date_generated' => 'required|date',
        ]);

        $report->update($request->all());

        return redirect()->route('reports.index', [$report->farm])->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        $farm = $report->farm;
        $report->delete();
        return redirect()->route('reports.index', [$farm])->with('success', 'Report deleted successfully.');
    }
}
