<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Zoo</title>
</head>
<body>
    <h1>Delete Zoo</h1>
    <p>Are you sure you want to delete the zoo "{{ $zoo->name }}"?</p>
    <form action="{{ route('zoos.destroy', $zoo->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
