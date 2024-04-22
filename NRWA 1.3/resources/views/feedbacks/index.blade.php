<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
</head>
<body>
    <h1>Feedbacks</h1>
    <a href="{{ route('feedbacks.create') }}">Add Feedback</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Message</th>
                <th>Email</th>
                <th>Service ID</th>
                <th>Customer ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->message }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->customer_service_id }}</td>
                    <td>{{ $feedback->customer_id }}</td>
                    <td>
                        <a href="{{ route('feedbacks.show', $feedback->id) }}">View</a>
                        <a href="{{ route('feedbacks.edit', $feedback->id) }}">Edit</a>
                        <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST">
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
