<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Rentals</title>
</head>
<body>
    <h1>Weekly Rentals</h1>
    <a href="{{ route('weekly_rentals.create') }}">Add Weekly Rental</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Rental ID</th>
                <th>Start Date</th>
                <th>Amount</th>
                <th>Number of Weeks</th>
                <th>Vehicle ID</th>
                <th>Driver ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeklyRentals as $weeklyRental)
                <tr>
                    <td>{{ $weeklyRental->id }}</td>
                    <td>{{ $weeklyRental->rid }}</td>
                    <td>{{ $weeklyRental->sdate }}</td>
                    <td>{{ $weeklyRental->amount }}</td>
                    <td>{{ $weeklyRental->noweeks }}</td>
                    <td>{{ $weeklyRental->vehicle_id }}</td>
                    <td>{{ $weeklyRental->driver_id }}</td>
                    <td>
                        <a href="{{ route('weekly_rentals.show', $weeklyRental->id) }}">View</a>
                        <a href="{{ route('weekly_rentals.edit', $weeklyRental->id) }}">Edit</a>
                        <form action="{{ route('weekly_rentals.destroy', $weeklyRental->id) }}" method="POST">
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
