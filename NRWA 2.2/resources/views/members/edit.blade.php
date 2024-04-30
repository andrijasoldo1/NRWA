<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
</head>
<body>
    <h1>Edit Member</h1>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="mtype">Membership Type:</label>
        <input type="text" id="mtype" name="mtype" value="{{ $member->mtype }}">
        <br>
        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount" value="{{ $member->discount }}">
        <br>
        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" value="{{ $member->duration }}">
        <br>
        <label for="customer_id">Customer:</label>
<select name="customer_id" id="customer_id">
    @foreach ($customers as $customer)
        <option value="{{ $customer->id }}" {{ $customer->id == $member->customer_id ? 'selected' : '' }}>
            {{ $customer->name }} (ID: {{ $customer->id }})
        </option>
    @endforeach
</select>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
