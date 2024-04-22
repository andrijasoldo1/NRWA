<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Individual</title>
</head>
<body>
    <h1>Add Individual</h1>
    <form action="{{ route('individuals.store') }}" method="POST">
        @csrf
        <label for="ssn">SSN:</label>
        <input type="text" id="ssn" name="ssn">
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="owner_id">Owner ID:</label>
        <select name="owner_id" id="owner_id">
            @foreach ($owners as $owner)
                <option value="{{ $owner->id }}">Owner ID: {{ $owner->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Individual</button>
    </form>
</body>
</html>
