<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banks</title>
</head>
<body>
    <h1>Banks</h1>
    <a href="{{ route('banks.create') }}">Add Bank</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banks as $bank)
                <tr>
                    <td>{{ $bank->id }}</td>
                    <td>{{ $bank->bname }}</td>
                    <td>{{ $bank->city }}</td>
                    <td>{{ $bank->owner->name }}</td>
                    <td>
                        <a href="{{ route('banks.show', $bank->id) }}">View</a>
                        <a href="{{ route('banks.edit', $bank->id) }}">Edit</a>
                        <form action="{{ route('banks.destroy', $bank->id) }}" method="POST">
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
