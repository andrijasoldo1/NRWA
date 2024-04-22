<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Bill</title>
</head>
<body>
    <h1>Show Bill</h1>
    <p>Date: {{ $bill->bdate }}</p>
    <p>Advance: {{ $bill->advance }}</p>
    <p>Discount: {{ $bill->discount }}</p>
    <p>Driver Charge: {{ $bill->drivercharge }}</p>
    <p>Final Amount: {{ $bill->famount }}</p>
    <p>Rental ID: {{ $bill->rental_id }}</p>
    <p>Customer ID: {{ $bill->customer_id }}</p>
</body>
</html>

