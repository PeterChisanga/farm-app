@extends('layouts.app')

@section('content')
<style>
    .success {
    }

    .income-div span {
        padding: 5px;
        background-color: green;
        border-radius: 5px;
    }

    .expense-div span {
        padding: 5px;
        background-color: red;
        border-radius: 5px;
    }

    .profit-div span {
        padding: 5px;
        background-color: gray;
        border-radius: 5px;
    }


</style>

<h1 class="bg-success mb-3 p-2 rounded">Farm Profit Analysis</h1>

<div class="row">
  <div class="col-md-6 mb-3">
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
    <div class="card-header">{{ __('Profitability Analysis') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="income-div">
                    <h3 class="custom-h3 "><span>Total Income :</span> K {{ $reportData['totalIncome'] }}</h3>
                </div>
                <br>
                <div class="expense-div">
                    <h3 class="custom-h3 expense"><span>Total Expenses :</span> K {{ $reportData['totalExpenses'] }}</h3>
                </div>
                <br>
                <div class="profit-div">
                    <h3 class="custom-h3"><span>Net Profit :</span> K {{ $reportData['netProfit'] }}</h3>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="profitLossChart" width="400" height="400"></canvas>
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
  <a href="{{ route('reports.download-profit-analysis-pdf') }}" class="btn btn-primary me-2">Download PDF</a>
  {{-- <a href="{{ route('reports.download-profit-analysis-csv') }}" class="btn btn-success">Download Excel</a> --}}
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('profitLossChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Income', 'Expenses'],
            datasets: [{
                label: 'Profit/Loss',
                backgroundColor: ['green', 'red'],
                data: [{{ $reportData['totalIncome'] }}, {{ $reportData['totalExpenses'] }}]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Profit/Loss Chart'
            }
        }
    });
</script>
@endsection
