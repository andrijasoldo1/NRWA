<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalji automobila</title>
</head>
<body>
    <h1>Detalji automobila</h1>
    <p><strong>ID vlasnika:</strong> {{ $car->owner_id }}</p>
    <p><strong>Registracijska oznaka:</strong> {{ $car->license_no }}</p>
    <p><strong>Model:</strong> {{ $car->model }}</p>
    <p><strong>Godina:</strong> {{ $car->year }}</p>
    <p><strong>Vrsta automobila:</strong> {{ $car->ctype }}</p>
    <p><strong>Dnevna cijena najma:</strong> {{ $car->drate }}</p>
    <p><strong>Cijena najma po tjednu:</strong> {{ $car->wrate }}</p>
    <p><strong>Status:</strong> {{ $car->status }}</p>
    <a href="{{ route('cars.edit', $car->id) }}">Uredi</a>
</body>
</html>
