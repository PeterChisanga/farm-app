<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Incomes Report</title>
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
    <h1>Farm Incomes Report</h1>
    <p>Report Date: {{ date('Y-m-d') }}</p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportData['incomes'] as $income)
            <tr>
                <td>{{ $income->date }}</td>
                <td>{{ $income->category }}</td>
                <td>K {{ number_format($income->amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total">
                <td>Total Incomes</td>
                <td></td>
                <td>K {{ number_format($reportData['totalIncomes'], 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
