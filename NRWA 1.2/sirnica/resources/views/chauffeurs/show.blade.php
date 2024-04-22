<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Chauffeur</title>
</head>
<body>
    <h1>View Chauffeur</h1>
    <p>ID: {{ $chauffeur->id }}</p>
    <p>Name: {{ $chauffeur->name }}</p>
    <p>Gender: {{ $chauffeur->gender }}</p>
    <p>Status: {{ $chauffeur->status }}</p>
    <p>Mobile: {{ $chauffeur->mobile }}</p>
    <p>Driver ID: {{ $chauffeur->driver_id }}</p>
</body>
</html>

