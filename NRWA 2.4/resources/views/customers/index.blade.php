<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popis kupaca</title>
</head>
<body>
    <h1>Popis kupaca</h1>
    <a href="{{ route('customers.create') }}">Dodaj novog kupca</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Telefon</th>
                <th>Vozač ID</th>
                <th>Vozilo ID</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->fname }}</td>
                <td>{{ $customer->lname }}</td>
                <td>{{ $customer->mobile }}</td>
                <td>{{ $customer->driver_id }}</td>
                <td>{{ $customer->vehicle_id }}</td>
                <td>
                    <a href="{{ route('customers.show', $customer->id) }}">Prikaz</a> |
                    <a href="{{ route('customers.edit', $customer->id) }}">Uredi</a> |
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
