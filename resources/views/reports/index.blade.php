@extends('layouts.app')

@section('content')
<h1 class="bg-success mb-3 p-2 rounded"><span >Farm Profitability </span>Report for {{ $reportData['farmName'] }}</h1>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        Income Summary
      </div>
      <div class="card-body">
        <ul class="list-group">
          @foreach ($reportData['incomes'] as $income)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{ $income->category }}
              <span class="badge bg-success rounded-pill">K {{ number_format($income->amount, 2) }}</span>
            </li>
          @endforeach
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Income
            <span class="badge bg-success rounded-pill">K {{ number_format($reportData['totalIncome'], 2) }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        Expense Summary
      </div>
      <div class="card-body">
        <ul class="list-group">
          @foreach ($reportData['expenses'] as $expense)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{ $expense->category }}
              <span class="badge bg-danger rounded-pill">K {{ number_format($expense->amount, 2) }}</span>
            </li>
          @endforeach
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Expenses
            <span class="badge bg-danger rounded-pill">K {{ number_format($reportData['totalExpenses'], 2) }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">
    Profitability Overview
  </div>
  <div class="card-body">
    <p>Total Income: K <span class="{{ $reportData['netProfit'] > 0 ? 'text-success' : 'text-danger' }}">{{ number_format($reportData['totalIncome'], 2) }}</span></p>
    <p>Total Expenses: K <span class="text-danger">{{ number_format($reportData['totalExpenses'], 2) }}</span></p>
    <hr>
    <p>Net Profit: <strong class="{{ $reportData['netProfit'] > 0 ? 'text-success' : 'text-danger' }}">K <span>{{ number_format($reportData['netProfit'], 2) }}</span></strong></p>
  </div>
</div>

<div class="d-flex justify-content-end mt-3">
  {{-- <a href="" class="btn btn-primary me-2">Download PDF</a> --}}
  {{-- <a href="" class="btn btn-success">Download Excel</a> --}}
</div>

@endsection
