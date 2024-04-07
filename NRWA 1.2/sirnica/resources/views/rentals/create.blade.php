<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rental</title>
</head>
<body>
    <h1>Add Rental</h1>
    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf
        <label for="rdate">Date:</label>
        <input type="date" id="rdate" name="rdate">
        <br>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount">
        <br>
        <label for="driver_id">Driver:</label>
        <select name="driver_id" id="driver_id">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->name }} (ID: {{ $driver->id }})</option>
            @endforeach
        </select>
        <br>
        <label for="vehicle_id">Vehicle:</label>
        <select name="vehicle_id" id="vehicle_id">
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->name }} (ID: {{ $vehicle->id }})</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Rental</button>
    </form>
</body>
</html>
