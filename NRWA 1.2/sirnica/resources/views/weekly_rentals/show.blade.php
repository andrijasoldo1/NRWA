<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Details</title>
</head>
<body>
    <h1>Rental Details</h1>
    <p>ID: {{ $rental->id }}</p>
    <p>Date: {{ $rental->rdate }}</p>
    <p>Amount: {{ $rental->amount }}</p>
    <p>Driver ID: {{ $rental->driver_id }}</p>
    <p>Vehicle ID: {{ $rental->vehicle_id }}</p>
    <a href="{{ route('rentals.edit', $rental->id) }}">Edit</a>
    <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
