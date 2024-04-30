<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popis vlasnika</title>
</head>
<body>
    <h1>Popis vlasnika</h1>
    <a href="{{ route('owners.create') }}">Dodaj novog vlasnika</a>
    <ul>
        @foreach($owners as $owner)
            <li>
                <a href="{{ route('owners.show', $owner->id) }}">{{ $owner->id }}</a>
                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Obriši</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
