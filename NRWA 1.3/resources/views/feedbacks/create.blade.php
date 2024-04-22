<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Feedback</title>
</head>
<body>
    <h1>Add Feedback</h1>
    <form action="{{ route('feedbacks.store') }}" method="POST">
        @csrf
        <label for="message">Message:</label>
        <input type="text" id="message" name="message">
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <br>
        <label for="customer_service_id">Customer Service ID:</label>
        <select name="customer_service_id" id="customer_service_id">
            @foreach ($services as $service)
                <option value="{{ $service->id }}">Service ID: {{ $service->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="customer_id">Customer ID:</label>
        <select name="customer_id" id="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">Customer ID: {{ $customer->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Feedback</button>
    </form>
</body>
</html>
