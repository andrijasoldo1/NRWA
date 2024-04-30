<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
</head>
<body>
    <h1>Members</h1>
    <a href="{{ route('members.create') }}">Add Member</a>
    <br><br>
    @if ($members->isEmpty())
        <p>No members found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Membership Type</th>
                    <th>Discount</th>
                    <th>Duration</th>
                    <th>Customer ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->mtype }}</td>
                        <td>{{ $member->discount }}</td>
                        <td>{{ $member->duration }}</td>
                        <td>{{ $member->customer_id }}</td>
                        <td>
                            <a href="{{ route('members.show', $member->id) }}">Show</a>
                            <a href="{{ route('members.edit', $member->id) }}">Edit</a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
