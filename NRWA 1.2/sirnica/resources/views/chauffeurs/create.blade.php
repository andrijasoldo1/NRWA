<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Chauffeur</title>
</head>
<body>
    <h1>Create Chauffeur</h1>
    <form action="{{ route('chauffeurs.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">
        <br>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status">
        <br>
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile">
        <br>
        <label for="driver_id">Driver ID:</label>
        <select name="driver_id" id="driver_id">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Chauffeur</button>
    </form>
</body>
</html>
