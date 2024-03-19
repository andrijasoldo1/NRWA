<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Animal</title>
</head>
<body>
    <h1>Delete Animal</h1>
    <p>Are you sure you want to delete the animal "{{ $animal->name }}"?</p>
    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>
