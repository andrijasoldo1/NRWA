<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills</title>
</head>
<body>
    <h1>Bills</h1>
    <a href="{{ route('bills.create') }}">Add Bill</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Advance</th>
                <th>Discount</th>
                <th>Driver Charge</th>
                <th>Final Amount</th>
                <th>Rental ID</th>
                <th>Customer ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
                <tr>
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->bdate }}</td>
                    <td>{{ $bill->advance }}</td>
                    <td>{{ $bill->discount }}</td>
                    <td>{{ $bill->drivercharge }}</td>
                    <td>{{ $bill->famount }}</td>
                    <td>{{ $bill->rental_id }}</td>
                    <td>{{ $bill->customer_id }}</td>
                    <td>
                        <a href="{{ route('bills.show', $bill->id) }}">View</a>
                        <a href="{{ route('bills.edit', $bill->id) }}">Edit</a>
                        <form action="{{ route('bills.destroy', $bill->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
