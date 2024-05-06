<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rental</title>
</head>
<body>
    <h1>Edit Rental</h1>
    <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="rdate">Date:</label>
        <input type="date" id="rdate" name="rdate" value="{{ $rental->rdate }}">
        <br>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" value="{{ $rental->amount }}">
        <br>
        <label for="driver_id">Driver:</label>
        <select name="driver_id" id="driver_id">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" {{ $driver->id == $rental->driver_id ? 'selected' : '' }}>{{ $driver->name }} (ID: {{ $driver->id }})</option>
            @endforeach
        </select>
        <br>
        <label for="vehicle_id">Vehicle:</label>
        <select name="vehicle_id" id="vehicle_id">
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ $vehicle->id == $rental->vehicle_id ? 'selected' : '' }}>{{ $vehicle->name }} (ID: {{ $vehicle->id }})</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>

