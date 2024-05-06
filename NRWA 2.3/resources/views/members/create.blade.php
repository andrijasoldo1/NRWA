<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Member</title>
</head>

<body>
    <h1>Add Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <label for="mtype">Membership Type:</label>
        <input type="text" id="mtype" name="mtype" required value="{{ old('mtype') }}">
        <br>

        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount" required pattern="\d+(\.\d{1,2})?" title="Discount should be a numeric value" value="{{ old('discount') }}">
        <br>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required value="{{ old('duration') }}">
        <br>

        <label for="customer_id">Customer:</label>
        <select id="customer_id" name="customer_id" required>
            <option value="">-- Select a Customer --</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                    {{ $customer->fname }} {{ $customer->lname }}
                </option>
            @endforeach
        </select>
        <br>

        <button type="submit">Add Member</button>
    </form>

    <!-- Display error messages, if any -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
