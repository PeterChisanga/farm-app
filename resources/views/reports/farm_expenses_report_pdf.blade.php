<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Expenses Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Farm Expenses Report</h1>
    <p>Report Date : {{ date('Y-m-d') }}</p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportData['expenses'] as $expense)
            <tr>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->category }}</td>
                <td>K {{ number_format($expense->amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total">
                <td>Total Expenses</td>
                <td></td>
                <td>K {{ number_format($reportData['totalExpenses'], 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
