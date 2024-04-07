<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individuals</title>
</head>
<body>
    <h1>Individuals</h1>
    <a href="{{ route('individuals.create') }}">Add Individual</a>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>SSN</th>
            <th>Name</th>
            <th>Owner ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($individuals as $individual)
            <tr>
                <td>{{ $individual->id }}</td>
                <td>{{ $individual->ssn }}</td>
                <td>{{ $individual->name }}</td>
                <td>{{ $individual->owner_id }}</td>
                <td>
                    <a href="{{ route('individuals.show', $individual->id) }}">View</a>
                    <a href="{{ route('individuals.edit', $individual->id) }}">Edit</a>
                    <form action="{{ route('individuals.destroy', $individual->id) }}" method="POST">
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
