<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz vozača</title>
</head>
<body>
    <h1>Prikaz vozača</h1>
    <p>ID: {{ $driver->id }}</p>
    <a href="{{ route('drivers.index') }}">Natrag na popis</a>
</body>
</html>
