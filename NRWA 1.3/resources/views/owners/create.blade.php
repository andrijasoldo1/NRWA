<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj novog vlasnika</title>
</head>
<body>
    <h1>Dodaj novog vlasnika</h1>
    <form action="{{ route('owners.store') }}" method="POST">
        @csrf
        <button type="submit">Dodaj vlasnika</button>
    </form>
</body>
</html>

