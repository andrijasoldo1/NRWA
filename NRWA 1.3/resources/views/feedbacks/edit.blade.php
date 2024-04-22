<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Feedback</title>
</head>
<body>
    <h1>Edit Feedback</h1>
    <form action="{{ route('feedbacks.update', $feedback->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" value="{{ $feedback->message }}">
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="{{ $feedback->email }}">
        <br>
        <label for="customer_service_id">Customer Service ID:</label>
        <select name="customer_service_id" id="customer_service_id">
            @foreach ($services as $service)
                <option value="{{ $service->id }}" {{ $service->id == $feedback->customer_service_id ? 'selected' : '' }}>Service ID: {{ $service->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="customer_id">Customer ID:</label>
        <select name="customer_id" id="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $customer->id == $feedback->customer_id ? 'selected' : '' }}>Customer ID: {{ $customer->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
