<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodavanje novog kupca</title>
</head>
<body>
    <h1>Dodavanje novog kupca</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label for="fname">Ime:</label>
        <input type="text" id="fname" name="fname">
        <br>
        <label for="lname">Prezime:</label>
        <input type="text" id="lname" name="lname">
        <br>
        <label for="mobile">Telefon:</label>
        <input type="text" id="mobile" name="mobile">
        <br>
        <label for="driver_id">Vozač:</label>
<select name="driver_id" id="driver_id">
    @foreach ($drivers as $driver)
        <option value="{{ $driver->id }}">{{ $driver->name }} (ID: {{ $driver->id }})</option>
    @endforeach
</select>

<br>
<label for="vehicle_id">Vozilo:</label>
<select name="vehicle_id" id="vehicle_id">
    @foreach ($cars as $car)
        <option value="{{ $car->id }}">{{ $car->name }} (ID: {{ $car->id }})</option>
    @endforeach
</select>




        <br>
        <button type="submit">Dodaj kupca</button>
    </form>
</body>
</html>
