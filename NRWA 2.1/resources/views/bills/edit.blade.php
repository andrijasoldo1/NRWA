<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bill</title>
</head>
<body>
    <h1>Edit Bill</h1>
    <form action="{{ route('bills.update', $bill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="bdate">Date:</label>
        <input type="date" id="bdate" name="bdate" value="{{ $bill->bdate }}">
        <br>
        <label for="advance">Advance:</label>
        <input type="text" id="advance" name="advance" value="{{ $bill->advance }}">
        <br>
        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount" value="{{ $bill->discount }}">
        <br>
        <label for="drivercharge">Driver Charge:</label>
        <input type="text" id="drivercharge" name="drivercharge" value="{{ $bill->drivercharge }}">
        <br>
        <label for="famount">Final Amount:</label>
        <input type="text" id="famount" name="famount" value="{{ $bill->famount }}">
        <br>
        <label for="rental_id">Rental ID:</label>
        <select name="rental_id" id="rental_id">
            @foreach ($rentals as $rental)
                <option value="{{ $rental->id }}" {{ $rental->id == $bill->rental_id ? 'selected' : '' }}>{{ $rental->id }}</option>
            @endforeach
        </select>
        <br>
        <label for="customer_id">Customer ID:</label>
        <select name="customer_id" id="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $customer->id == $bill->customer_id ? 'selected' : '' }}>{{ $customer->id }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
