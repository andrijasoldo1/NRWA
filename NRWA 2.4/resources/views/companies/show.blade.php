<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Company</title>
</head>
<body>
    <h1>Show Company</h1>
    <p>ID: {{ $company->id }}</p>
    <p>Company Name: {{ $company->cname }}</p>
    <p>Owner ID: {{ $company->owner->id }}</p>
    <a href="{{ route('companies.edit', $company->id) }}">Edit</a>
    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
