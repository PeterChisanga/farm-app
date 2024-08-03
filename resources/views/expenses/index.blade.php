@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Expenses') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Register Expense</a>
                        <a href="{{ route('reports.download-expenses-pdf') }}" class="btn btn-secondary">Download Expenses Report</a>

                        <div class="row">
                            <div class="mt-3 col-md-6">
                                <label for="category">Sort by Category:</label>
                                <select id="category" class="form-control">
                                    <option value="">All Categories</option>
                                    <option value="fertilizers">Fertilizers</option>
                                    <option value="chemicals">Chemicals</option>
                                    <option value="equipment">Equipment</option>
                                    <option value="feed">Feed</option>
                                    <option value="salaries">Salaries</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>

                            <div class="mt-3 col-md-6">
                                <label for="sort">Sort by Month/Date:</label>
                                <select id="sort" class="form-control">
                                    <option value="all">All</option>
                                    @foreach($expenses as $expense)
                                        <option value="{{ substr($expense->date, 0, 7) }}">{{ date('F Y', strtotime($expense->date)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <table class="table table-bordered mt-3" id="expenses-table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                <tr data-category="{{ $expense->category }}" data-date="{{ substr($expense->date, 0, 7) }}">
                                    <td>{{ $expense->category }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->date }}</td>
                                    <td>
                                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this expense?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total Expenses</th>
                                    <th id="total-expenses" colspan="3"></th>
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
    // Get the expenses table
    const expensesTable = document.getElementById('expenses-table');

    // Get the rows inside the expenses table
    const expenseRows = expensesTable.querySelectorAll('tbody tr');

    // Get the total expenses cell
    const totalExpensesCell = document.getElementById('total-expenses');

    // Calculate total expenses
    let totalExpenses = 0;

    function calculateTotalExpenses() {
        totalExpenses = 0;
        expenseRows.forEach(row => {
            if (row.style.display !== 'none') {
                totalExpenses += parseFloat(row.children[1].textContent);
            }
        });
        totalExpensesCell.textContent = `K ${totalExpenses.toFixed(2)}`;
    }

    calculateTotalExpenses();

    // Filter expenses based on selected category
    document.getElementById('category').addEventListener('change', function() {
        const selectedCategory = this.value;
        expenseRows.forEach(row => {
            if (selectedCategory === '' || row.dataset.category === selectedCategory) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        calculateTotalExpenses();
    });

    // Filter expenses based on selected month/date
    document.getElementById('sort').addEventListener('change', function() {
        const selectedDate = this.value;
        expenseRows.forEach(row => {
            if (selectedDate === 'all' || row.dataset.date === selectedDate) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        calculateTotalExpenses();
    });
</script>

@endsection
