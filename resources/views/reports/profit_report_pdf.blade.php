<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profit Report PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 800px;
        }
        h1 {
            text-align: center;
        }
        .summary {
            margin-top: 30px;
            border-collapse: collapse;
            width: 100%;
        }
        .summary th, .summary td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        .summary th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profit Report</h1>

        <h2>Income Summary</h2>
        <table class="summary">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportData['incomes'] as $income)
                <tr>
                    <td>{{ $income->category }}</td>
                    <td>K {{ number_format($income->amount,2) }}</td>
                </tr>
                @endforeach
                <tr>
                    <th>Total Income</th>
                    <th>K {{ number_format($reportData['totalIncome'] ,2)}}</th>
                </tr>
            </tbody>
        </table>

        <h2>Expense Summary</h2>
        <table class="summary">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportData['expenses'] as $expense)
                <tr>
                    <td>{{ $expense->category }}</td>
                    <td>K {{ number_format($expense->amount,2)}}</td>
                </tr>
                @endforeach
                <tr>
                    <th>Total Expenses</th>
                    <th>K {{ number_format($reportData['totalExpenses'],2) }}</th>
                </tr>
            </tbody>
        </table>

        <h2>Profitability Analysis</h2>
        <ul>
            <li>Total Income: K {{ number_format($reportData['totalIncome'],2)}}</li>
            <li>Total Expenses: K {{ number_format($reportData['totalExpenses'],2 )}}</li>
            <li>Net Profit: K {{ number_format($reportData['netProfit'],2) }}</li>
        </ul>
    </div>
</body>
</html>
