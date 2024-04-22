<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bank</title>
</head>
<body>
    <h1>Edit Bank</h1>
    <form action="{{ route('banks.update', $bank->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="bname">Name:</label>
        <input type="text" id="bname" name="bname" value="{{ $bank->bname }}">
        <br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="{{ $bank->city }}">
        <br>
        <label for="owner_id">Owner ID:</label>
<select name="owner_id" id="owner_id">
    @foreach ($owners as $owner)
        <option value="{{ $owner->id }}" {{ $owner->id == $bank->owner_id ? 'selected' : '' }}>Owner ID: {{ $owner->id }}</option>
    @endforeach
</select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>

