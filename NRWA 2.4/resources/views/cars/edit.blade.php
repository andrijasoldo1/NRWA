<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi automobil</title>
</head>
<body>
    <h1>Uredi automobil</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="owner_id">ID vlasnika:</label>
        <input type="text" id="owner_id" name="owner_id" value="{{ $car->owner_id }}">
        
        <label for="license_no">Registracijska oznaka:</label>
        <input type="text" id="license_no" name="license_no" value="{{ $car->license_no }}">
        
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="{{ $car->model }}">
        
        <label for="year">Godina:</label>
        <input type="text" id="year" name="year" value="{{ $car->year }}">
        
        <label for="ctype">Vrsta automobila:</label>
        <input type="text" id="ctype" name="ctype" value="{{ $car->ctype }}">
        
        <label for="drate">Dnevna cijena najma:</label>
        <input type="text" id="drate" name="drate" value="{{ $car->drate }}">
        
        <label for="wrate">Cijena najma po tjednu:</label>
        <input type="text" id="wrate" name="wrate" value="{{ $car->wrate }}">
        
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="{{ $car->status }}">
        
        <button type="submit">Spremi promjene</button>
    </form>
</body>
</html>
