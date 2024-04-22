<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chauffeur</title>
</head>
<body>
    <h1>Edit Chauffeur</h1>
    <form action="{{ route('chauffeurs.update', $chauffeur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $chauffeur->name }}">
        <br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="{{ $chauffeur->gender }}">
        <br>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="{{ $chauffeur->status }}">
        <br>
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" value="{{ $chauffeur->mobile }}">
        <br>
        <label for="driver_id">Driver ID:</label>
        <select name="driver_id" id="driver_id">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" {{ $driver->id == $chauffeur->driver_id ? 'selected' : '' }}>{{ $driver->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
