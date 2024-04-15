<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details</title>
</head>
<body>
    <h1>Member Details</h1>
    <p><strong>ID:</strong> {{ $member->id }}</p>
    <p><strong>Membership Type:</strong> {{ $member->mtype }}</p>
    <p><strong>Discount:</strong> {{ $member->discount }}</p>
    <p><strong>Duration:</strong> {{ $member->duration }}</p>
    <p><strong>Customer ID:</strong> {{ $member->customer_id }}</p>
    <a href="{{ route('members.index') }}">Back to Members</a>
</body>
</html>
