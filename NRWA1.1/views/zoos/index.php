<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Zoos</title>
</head>
<body>
    <h1>List of Zoos</h1>
    <ul>
        @foreach($zoos as $zoo)
            <li>{{ $zoo->name }}</li>
        @endforeach
    </ul>
</body>
</html>
