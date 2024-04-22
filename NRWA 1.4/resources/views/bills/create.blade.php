<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bill</title>
</head>
<body>
    <h1>Add Bill</h1>
    <form action="{{ route('bills.store') }}" method="POST">
        @csrf
        <label for="bdate">Date:</label>
        <input type="date" id="bdate" name="bdate">
        <br>
        <label for="advance">Advance:</label>
        <input type="text" id="advance" name="advance">
        <br>
        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount">
        <br>
        <label for="drivercharge">Driver Charge:</label>
        <input type="text" id="drivercharge" name="drivercharge">
        <br>
        <label for="famount">Final Amount:</label>
        <input type="text" id="famount" name="famount">
        <br>
        <label for="rental_id">Rental ID:</label>
        <select name="rental_id" id="rental_id">
            @foreach ($rentals as $rental)
                <option value="{{ $rental->id }}">{{ $rental->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="customer_id">Customer ID:</label>
        <select name="customer_id" id="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Bill</button>
    </form>
</body>
</html>
