<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Service</title>
</head>
<body>
    <h1>Service Details</h1>
    <p><strong>Name:</strong> {{ $service->name }}</p>
    <p><strong>Mobile:</strong> {{ $service->mobile }}</p>
    <a href="{{ route('customer_services.index') }}">Back to List</a>
</body>
</html>
