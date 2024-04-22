<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentals</title>
</head>
<body>
    <h1>Rentals</h1>
    <a href="{{ route('rentals.create') }}">Add Rental</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Driver</th>
                <th>Vehicle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->rdate }}</td>
                    <td>{{ $rental->amount }}</td>
                    <td>{{ $rental->driver_id }}</td>
                    <td>{{ $rental->vehicle_id }}</td>
                    <td>
                        <a href="{{ route('rentals.show', $rental->id) }}">View</a>
                        <a href="{{ route('rentals.edit', $rental->id) }}">Edit</a>
                        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
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
