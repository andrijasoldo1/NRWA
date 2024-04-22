<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ownerships</title>
</head>
<body>
    <h1>Ownerships</h1>
    <a href="{{ route('owns.create') }}">Add Ownership</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Owner ID</th>
                <th>Vehicle ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($owns as $own)
                <tr>
                    <td>{{ $own->id }}</td>
                    <td>{{ $own->owner_id }}</td>
                    <td>{{ $own->vehicle_id }}</td>
                    <td>
                        <a href="{{ route('owns.show', $own->id) }}">View</a>
                        <a href="{{ route('owns.edit', $own->id) }}">Edit</a>
                        <form action="{{ route('owns.destroy', $own->id) }}" method="POST">
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

