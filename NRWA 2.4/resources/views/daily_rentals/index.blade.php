<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Rentals</title>
</head>
<body>
    <h1>Daily Rentals</h1>
    <a href="{{ route('daily_rentals.create') }}">Add Daily Rental</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Rental ID</th>
                <th>Start Date</th>
                <th>Amount</th>
                <th>Number of Days</th>
                <th>Vehicle ID</th>
                <th>Driver ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->rid }}</td>
                    <td>{{ $rental->sdate }}</td>
                    <td>{{ $rental->amount }}</td>
                    <td>{{ $rental->nodays }}</td>
                    <td>{{ $rental->vehicle_id }}</td>
                    <td>{{ $rental->driver_id }}</td>
                    <td>
                        <a href="{{ route('daily_rentals.show', $rental->id) }}">View</a>
                        <a href="{{ route('daily_rentals.edit', $rental->id) }}">Edit</a>
                        <form action="{{ route('daily_rentals.destroy', $rental->id) }}" method="POST">
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
