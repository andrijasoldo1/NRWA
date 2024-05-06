<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podaci o vlasniku</title>
</head>
<body>
    <h1>Podaci o vlasniku</h1>
    <p>ID: {{ $owner->id }}</p>
    <p>Ime: {{ $owner->name }}</p>
    <a href="{{ route('owners.edit', $owner->id) }}">Uredi</a>
    <form action="{{ route('owners.destroy', $owner->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Obriši</button>
    </form>
</body>
</html>
