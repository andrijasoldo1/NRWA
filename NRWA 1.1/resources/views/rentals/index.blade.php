<div class="container">
    <h2>Rental List</h2>
    <a href="{{ route('rentals.create') }}" class="btn btn-success mb-2">Create New Rental</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->Rid }}</td>
                    <td>{{ $rental->Rdate }}</td>
                    <td>{{ $rental->Amount }}</td>
                    <td>
                        <a href="{{ route('rentals.show', $rental->Rid) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('rentals.edit', $rental->Rid) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rentals.destroy', $rental->Rid) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
