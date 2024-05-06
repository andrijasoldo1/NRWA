<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi vozača</title>
</head>
<body>
    <h1>Uredi vozača</h1>
    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">Spremi promjene</button>
    </form>
</body>
</html>
