<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bank</title>
</head>
<body>
    <h1>Add Bank</h1>
    <form action="{{ route('banks.store') }}" method="POST">
        @csrf
        <label for="bname">Name:</label>
        <input type="text" id="bname" name="bname">
        <br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city">
        <br>
        <label for="owner_id">Owner:</label>
<select name="owner_id" id="owner_id">
    @foreach ($owners as $owner)
        <option value="{{ $owner->id }}">Owner ID: {{ $owner->id }} - {{ $owner->name }}</option>
    @endforeach
</select>

        <br>
        <button type="submit">Add Bank</button>
    </form>
</body>
</html>
