<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Rental Details</title>
</head>
<body>
    <h1>Daily Rental Details</h1>
    <p><strong>Rental ID:</strong> {{ $rental->rid }}</p>
    <p><strong>Start Date:</strong> {{ $rental->sdate }}</p>
    <p><strong>Amount:</strong> {{ $rental->amount }}</p>
    <p><strong>Number of Days:</strong> {{ $rental->nodays }}</p>
    <p><strong>Vehicle ID:</strong> {{ $rental->vehicle_id }}</p>
    <p><strong>Driver ID:</strong> {{ $rental->driver_id }}</p>
    <a href="{{ route('daily_rentals.edit', $rental->id) }}">Edit</a>
    <form action="{{ route('daily_rentals.destroy', $rental->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
