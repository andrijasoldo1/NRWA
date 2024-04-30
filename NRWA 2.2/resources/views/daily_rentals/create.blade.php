<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Daily Rental</title>
</head>
<body>
    <h1>Add Daily Rental</h1>
    <form action="{{ route('daily_rentals.store') }}" method="POST">
        @csrf
        <label for="rid">Rental ID:</label>
        <select name="rid" id="rid">
            @foreach ($rentals as $rental)
                <option value="{{ $rental->id }}">{{ $rental->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="sdate">Start Date:</label>
        <input type="date" id="sdate" name="sdate">
        <br>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount">
        <br>
        <label for="nodays">Number of Days:</label>
        <input type="text" id="nodays" name="nodays">
        <br>
        <label for="vehicle_id">Vehicle ID:</label>
        <select name="vehicle_id" id="vehicle_id">
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="driver_id">Driver ID:</label>
        <select name="driver_id" id="driver_id">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Daily Rental</button>
    </form>
</body>
</html>
