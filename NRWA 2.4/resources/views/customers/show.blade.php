<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz kupca</title>
</head>
<body>
    <h1>Prikaz kupca</h1>
    <ul>
        <li>ID: {{ $customer->id }}</li>
        <li>Ime: {{ $customer->fname }}</li>
        <li>Prezime: {{ $customer->lname }}</li>
        <li>Telefon: {{ $customer->mobile }}</li>
        <li>Vozač ID: {{ $customer->driver_id }}</li>
        <li>Vozilo ID: {{ $customer->vehicle_id }}</li>
    </ul>
</body>
</html>
