<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
</head>
<body>
    <h1>Companies</h1>
    <a href="{{ route('companies.create') }}">Add Company</a>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Company Name</th>
            <th>Owner ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->cname }}</td>
                <td>{{ $company->owner->id }}</td>
                <td>
                    <a href="{{ route('companies.show', $company->id) }}">View</a>
                    <a href="{{ route('companies.edit', $company->id) }}">Edit</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
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

