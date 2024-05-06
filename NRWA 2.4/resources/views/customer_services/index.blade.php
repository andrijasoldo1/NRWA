<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Services</title>
</head>
<body>
    <h1>Customer Services</h1>
    <a href="{{ route('customer_services.create') }}">Add New Service</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->mobile }}</td>
                <td>
                    <a href="{{ route('customer_services.show', $service->id) }}">View</a>
                    <a href="{{ route('customer_services.edit', $service->id) }}">Edit</a>
                    <form action="{{ route('customer_services.destroy', $service->id) }}" method="POST">
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
