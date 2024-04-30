<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Individual</title>
</head>
<body>
    <h1>Edit Individual</h1>
    <form action="{{ route('individuals.update', $individual->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="ssn">SSN:</label>
        <input type="text" id="ssn" name="ssn" value="{{ $individual->ssn }}">
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $individual->name }}">
        <br>
        <label for="owner_id">Owner ID:</label>
        <select name="owner_id" id="owner_id">
            @foreach ($owners as $owner)
                <option value="{{ $owner->id }}" {{ $owner->id == $individual->owner_id ? 'selected' : '' }}>Owner ID: {{ $owner->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>

