<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popis automobila</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Popis automobila</h1>
    <a href="{{ route('cars.create') }}">Dodaj novi automobil</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID vlasnika</th>
                <th>Registracijska oznaka</th>
                <th>Model</th>
                <th>Godina</th>
                <th>Vrsta</th>
                <th>Dnevna cijena najma</th>
                <th>Cijena najma po tjednu</th>
                <th>Status</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->owner_id }}</td>
                <td>{{ $car->license_no }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->ctype }}</td>
                <td>{{ $car->drate }}</td>
                <td>{{ $car->wrate }}</td>
                <td>{{ $car->status }}</td>
                <td>
                    <a href="{{ route('cars.show', $car->id) }}">Prikaz</a>
                    <a href="{{ route('cars.edit', $car->id) }}">Uredi</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
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
