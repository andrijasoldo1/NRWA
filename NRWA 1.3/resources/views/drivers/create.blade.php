<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj novog vozača</title>
</head>
<body>
    <h1>Dodaj novog vozača</h1>
    <form action="{{ route('drivers.store') }}" method="POST">
        @csrf
        <button type="submit">Dodaj vozača</button>
    </form>
</body>
</html>
