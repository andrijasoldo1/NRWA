<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ownership</title>
</head>
<body>
    <h1>Edit Ownership</h1>
    <form action="{{ route('owns.update', $owns->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="owner_id">Owner ID:</label>
        <select name="owner_id" id="owner_id">
            @foreach ($owners as $owner)
                <option value="{{ $owner->id }}" {{ $owner->id == $owns->owner_id ? 'selected' : '' }}>{{ $owner->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="vehicle_id">Vehicle ID:</label>
        <select name="vehicle_id" id="vehicle_id">
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ $vehicle->id == $owns->vehicle_id ? 'selected' : '' }}>{{ $vehicle->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
