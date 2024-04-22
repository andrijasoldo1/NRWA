<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chauffeurs</title>
</head>
<body>
    <h1>Chauffeurs</h1>
    <a href="{{ route('chauffeurs.create') }}">Add Chauffeur</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Mobile</th>
                <th>Driver ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chauffeurs as $chauffeur)
                <tr>
                    <td>{{ $chauffeur->id }}</td>
                    <td>{{ $chauffeur->name }}</td>
                    <td>{{ $chauffeur->gender }}</td>
                    <td>{{ $chauffeur->status }}</td>
                    <td>{{ $chauffeur->mobile }}</td>
                    <td>{{ $chauffeur->driver_id }}</td>
                    <td>
                        <a href="{{ route('chauffeurs.show', $chauffeur->id) }}">View</a>
                        <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}">Edit</a>
                        <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
