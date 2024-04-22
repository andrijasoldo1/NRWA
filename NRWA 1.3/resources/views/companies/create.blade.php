<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Company</title>
</head>
<body>
    <h1>Add Company</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <label for="cname">Name:</label>
        <input type="text" id="cname" name="cname">
        <br>
        <label for="owner_id">Owner ID:</label>
<select name="owner_id" id="owner_id">
    @foreach ($owners as $owner)
        <option value="{{ $owner->id }}">Owner ID: {{ $owner->id }} - {{ $owner->name }}</option>
    @endforeach
</select>
        <br>
        <button type="submit">Add Company</button>
    </form>
</body>
</html>
