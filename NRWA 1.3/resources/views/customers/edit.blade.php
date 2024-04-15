<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uređivanje kupca</title>
</head>
<body>
    <h1>Uređivanje kupca</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="fname">Ime:</label>
        <input type="text" id="fname" name="fname" value="{{ $customer->fname }}">
        <br>
        <label for="lname">Prezime:</label>
        <input type="text" id="lname" name="lname" value="{{ $customer->lname }}">
        <br>
        <label for="mobile">Telefon:</label>
        <input type="text" id="mobile" name="mobile" value="{{ $customer->mobile }}">
        <br>
        <label for="driver_id">Vozač:</label>
        <select name="driver_id" id="driver_id">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" {{ $driver->id == $customer->driver_id ? 'selected' : '' }}>{{ $driver->name }} (ID: {{ $driver->id }})</option>
            @endforeach
        </select>
        <br>
        <label for="vehicle_id">Vozilo:</label>
        <select name="vehicle_id" id="vehicle_id">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}" {{ $car->id == $customer->vehicle_id ? 'selected' : '' }}>{{ $car->name }} (ID: {{ $car->id }})</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Spremi promjene</button>
    </form>
</body>
</html>
