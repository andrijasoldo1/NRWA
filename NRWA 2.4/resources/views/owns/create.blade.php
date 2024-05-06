<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ownership</title>
</head>
<body>
    <h1>Add Ownership</h1>
    <form action="{{ route('owns.store') }}" method="POST">
        @csrf
        <label for="owner_id">Owner ID:</label>
        <select name="owner_id" id="owner_id">
            @foreach ($owners as $owner)
                <option value="{{ $owner->id }}">{{ $owner->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="vehicle_id">Vehicle ID:</label>
        <select name="vehicle_id" id="vehicle_id">
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Ownership</button>
    </form>
</body>
</html>
