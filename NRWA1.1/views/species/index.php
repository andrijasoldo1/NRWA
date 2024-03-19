<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Species</title>
</head>
<body>
    <h1>List of Species</h1>
    <ul>
        @foreach($species as $singleSpecies)
            <li>{{ $singleSpecies->name }}</li>
        @endforeach
    </ul>
</body>
</html>
