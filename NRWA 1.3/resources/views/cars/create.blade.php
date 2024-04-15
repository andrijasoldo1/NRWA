<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj novi automobil</title>
</head>
<body>
    <h1>Dodaj novi automobil</h1>
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <label for="owner_id">Vlasnik automobila:</label>
        <select id="owner_id" name="owner_id">
            @foreach ($owners as $owner)
                <option value="{{ $owner->id }}">{{ $owner->name }} (ID: {{ $owner->id }})</option>
            @endforeach
        </select>
        
        <label for="license_no">Registracijska oznaka:</label>
        <input type="text" id="license_no" name="license_no">
        
        <label for="model">Model:</label>
        <input type="text" id="model" name="model">
        
        <label for="year">Godina:</label>
        <input type="text" id="year" name="year">
        
        <label for="ctype">Vrsta automobila:</label>
        <input type="text" id="ctype" name="ctype">
        
        <label for="drate">Dnevna cijena najma:</label>
        <input type="text" id="drate" name="drate">
        
        <label for="wrate">Cijena najma po tjednu:</label>
        <input type="text" id="wrate" name="wrate">
        
        <label for="status">Status:</label>
        <input type="text" id="status" name="status">
        
        <button type="submit">Dodaj automobil</button>
    </form>
</body>
</html>
