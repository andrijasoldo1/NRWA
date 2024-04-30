<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Self Driver</title>
</head>
<body>
    <h1>Edit Self Driver</h1>
    <form action="{{ route('self_drivers.update', $selfDriver->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="dlno">Driver License No:</label>
        <input type="text" id="dlno" name="dlno" value="{{ $selfDriver->dlno }}">
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $selfDriver->name }}">
        <br>
        <label for="insurance_no">Insurance No:</label>
        <input type="text" id="insurance_no" name="insurance_no" value="{{ $selfDriver->insurance_no }}">
        <br>
        <label for="driver_id">Driver:</label>
        <select name="driver_id" id="driver_id">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" {{ $driver->id == $selfDriver->driver_id ? 'selected' : '' }}>{{ $driver->name }} (ID: {{ $driver->id }})</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
