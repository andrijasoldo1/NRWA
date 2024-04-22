<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ownership Details</title>
</head>
<body>
    <h1>Ownership Details</h1>
    <p><strong>ID:</strong> {{ $owns->id }}</p>
    <p><strong>Owner ID:</strong> {{ $owns->owner_id }}</p>
    <p><strong>Vehicle ID:</strong> {{ $owns->vehicle_id }}</p>
    <a href="{{ route('owns.index') }}">Back to Ownerships</a>
</body>
</html>
