<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company</title>
</head>
<body>
    <h1>Edit Company</h1>
    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="cname">Name:</label>
        <input type="text" id="cname" name="cname" value="{{ $company->cname }}">
        <br>
        <label for="owner_id">Owner ID:</label>
<select name="owner_id" id="owner_id">
    @foreach ($owners as $owner)
        <option value="{{ $owner->id }}" {{ $company->owner_id == $owner->id ? 'selected' : '' }}>Owner ID: {{ $owner->id }} - {{ $owner->name }}</option>
    @endforeach
</select>

        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
