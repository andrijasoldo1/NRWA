<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Details</title>
</head>
<body>
    <h1>Feedback Details</h1>
    <p><strong>Message:</strong> {{ $feedback->message }}</p>
    <p><strong>Email:</strong> {{ $feedback->email }}</p>
    <p><strong>Customer Service ID:</strong> {{ $feedback->customer_service_id }}</p>
    <p><strong>Customer ID:</strong> {{ $feedback->customer_id }}</p>
    <a href="{{ route('feedbacks.edit', $feedback->id) }}">Edit</a>
    <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
