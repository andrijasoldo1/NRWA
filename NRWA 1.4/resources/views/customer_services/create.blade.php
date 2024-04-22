<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Service</title>
</head>
<body>
    <h1>Add New Service</h1>
    <form action="{{ route('customer_services.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile">
        <br>
        <button type="submit">Add Service</button>
    </form>
</body>
</html>
