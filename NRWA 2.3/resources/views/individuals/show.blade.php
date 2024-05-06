<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Individual</title>
</head>
<body>
    <h1>Show Individual</h1>
    <p>ID: {{ $individual->id }}</p>
    <p>SSN: {{ $individual->ssn }}</p>
    <p>Name: {{ $individual->name }}</p>
    <p>Owner ID: {{ $individual->owner_id }}</p>
    <a href="{{ route('individuals.edit', $individual->id) }}">Edit</a>
</body>
