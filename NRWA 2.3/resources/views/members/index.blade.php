<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <!-- Uključivanje Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Members</h1>
        
        <!-- Obrazac za pretraživanje -->
        <form method="GET" action="{{ route('members.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search members by customer name" value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Add Member</a>

        @if ($members->isEmpty())
            <div class="alert alert-info" role="alert">
                No members found.
            </div>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Membership Type</th>
                        <th>Discount</th>
                        <th>Duration</th>
                        <th>Customer Name</th>
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
                            <td>{{ $member->customer->fname }} {{ $member->customer->lname }}</td>
                            <td>
                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm mr-2">Show</a>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Uključivanje Bootstrap JavaScript i jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
