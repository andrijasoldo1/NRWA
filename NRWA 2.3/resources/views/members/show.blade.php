<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Details</title>
</head>
<body>
    <h1>Member Details</h1>
    <p><strong>ID:</strong> {{ $member->id }}</p>
    <p><strong>Membership Type:</strong> {{ $member->mtype }}</p>
    <p><strong>Discount:</strong> {{ $member->discount }}</p>
    <p><strong>Duration:</strong> {{ $member->duration }}</p>
    <p><strong>Customer:</strong> 
        {{ $member->customer->fname }} {{ $member->customer->lname }}
    </p>

    <a href="{{ route('members.index') }}">Back to Members</a>
</body>
</html>
