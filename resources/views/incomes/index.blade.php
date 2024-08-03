@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Incomes') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('incomes.create') }}" class="btn btn-primary">Register Income</a>
                        <a href="{{ route('reports.download-incomes-pdf') }}" class="btn btn-secondary">Download Incomes Report</a>

                        <div class="row">
                            <div class="mt-3 col-md-6">
                                <label for="category">Sort by Category:</label>
                                <select id="category" class="form-control">
                                    <option value="">All Categories</option>
                                    <option value="soya beans sales">Soya Beans Sales</option>
                                    <option value="maize sales">Maize Sales</option>
                                    <option value="sunflower sales">Sunflower Sales</option>
                                    <option value="pig sales">Pig Sales</option>
                                    <option value="cattle sales">Cattle Sales</option>
                                    <option value="sheep sales">Sheep Sales</option>
                                    <option value="goat sales">Goat Sales</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="mt-3 col-md-6">
                                <label for="sort">Sort by Month/Date:</label>
                                <select id="sort" class="form-control">
                                    <option value="all">All</option>
                                    @foreach($incomes as $income)
                                        <option value="{{ substr($income->date, 0, 7) }}">{{ date('F Y', strtotime($income->date)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <table class="table table-bordered mt-3" id="incomes-table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incomes as $income)
                                <tr data-category="{{ $income->category }}" data-date="{{ substr($income->date, 0, 7) }}">
                                    <td>{{ $income->category }}</td>
                                    <td>K {{ $income->amount }}</td>
                                    <td>{{ $income->date }}</td>
                                    <td>
                                        <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this income?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total Income</th>
                                    <th id="total-income" colspan="3"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the incomes table
    const incomesTable = document.getElementById('incomes-table');

    // Get the rows inside the incomes table
    const incomeRows = incomesTable.querySelectorAll('tbody tr');

    // Get the total income cell
    const totalIncomeCell = document.getElementById('total-income');

    // Calculate total income
    let totalIncome = 0;

    function calculateTotalIncome() {
        totalIncome = 0;
        incomeRows.forEach(row => {
            if (row.style.display !== 'none') {
                totalIncome += parseFloat(row.children[1].textContent.replace('K ', ''));
            }
        });
        totalIncomeCell.textContent = `K ${totalIncome.toFixed(2)}`;
    }

    calculateTotalIncome();

    // Filter incomes based on selected category
    document.getElementById('category').addEventListener('change', function() {
        const selectedCategory = this.value;
        incomeRows.forEach(row => {
            if (selectedCategory === '' || row.dataset.category === selectedCategory) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        calculateTotalIncome();
    });

    // Filter incomes based on selected month/date
    document.getElementById('sort').addEventListener('change', function() {
        const selectedDate = this.value;
        incomeRows.forEach(row => {
            if (selectedDate === 'all' || row.dataset.date === selectedDate) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        calculateTotalIncome();
    });
</script>

@endsection
