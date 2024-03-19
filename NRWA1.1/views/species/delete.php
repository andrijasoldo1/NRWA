<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Species</title>
</head>
<body>
    <h1>Delete Species</h1>
    <p>Are you sure you want to delete the species "{{ $species->name }}"?</p>
    <form action="{{ route('species.destroy', $species->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
