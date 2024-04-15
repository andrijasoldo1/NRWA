<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Bank</title>
</head>
<body>
    <h1>Show Bank</h1>
    <p><strong>ID:</strong> {{ $bank->id }}</p>
    <p><strong>Name:</strong> {{ $bank->bname }}</p>
    <p><strong>City:</strong> {{ $bank->city }}</p>
    <p><strong>Owner ID:</strong> {{ $bank->owner_id }}</p>
    <a href="{{ route('banks.index') }}">Back to Banks</a>
</body>
</html>
