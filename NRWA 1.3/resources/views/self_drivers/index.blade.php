
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Drivers</title>
</head>
<body>
    <h1>Self Drivers</h1>
    <a href="{{ route('self_drivers.create') }}">Add Self Driver</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>DL Number</th>
                <th>Name</th>
                <th>Insurance Number</th>
                <th>Driver ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($selfDrivers as $selfDriver)
                <tr>
                    <td>{{ $selfDriver->id }}</td>
                    <td>{{ $selfDriver->dlno }}</td>
                    <td>{{ $selfDriver->name }}</td>
                    <td>{{ $selfDriver->insurance_no }}</td>
                    <td>{{ $selfDriver->driver_id }}</td>
                    <td>
                        <a href="{{ route('self_drivers.show', $selfDriver->id) }}">View</a>
                        <a href="{{ route('self_drivers.edit', $selfDriver->id) }}">Edit</a>
                        <form action="{{ route('self_drivers.destroy', $selfDriver->id) }}" method="POST">
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
