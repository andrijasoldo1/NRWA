<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi podatke o vlasniku</title>
</head>
<body>
    <h1>Uredi podatke o vlasniku</h1>
    <form action="{{ route('owners.update', $owner->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Ime vlasnika:</label>
        <input type="text" id="name" name="name" value="{{ $owner->name }}">
        <button type="submit">Ažuriraj podatke</button>
    </form>
</body>
</html>
