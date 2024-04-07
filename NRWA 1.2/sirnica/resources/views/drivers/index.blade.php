<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popis vozača</title>
</head>
<body>
    <h1>Popis vozača</h1>
    <a href="{{ route('drivers.create') }}">Dodaj novog vozača</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drivers as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>
                        <a href="{{ route('drivers.show', $driver->id) }}">Prikaži</a>
                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
