<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Self Driver</title>
</head>
<body>
    <h1>Show Self Driver</h1>
    <p><strong>Driver License No:</strong> {{ $selfDriver->dlno }}</p>
    <p><strong>Name:</strong> {{ $selfDriver->name }}</p>
    <p><strong>Insurance No:</strong> {{ $selfDriver->insurance_no }}</p>
    <p><strong>Driver:</strong> {{ $selfDriver->driver->name }} (ID: {{ $selfDriver->driver_id }})</p>
    <a href="{{ route('self_drivers.edit', $selfDriver->id) }}">Edit</a>
</body>
</html>

