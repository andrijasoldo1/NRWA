<div class="container">
    <h2>Driver List</h2>
    <a href="{{ route('drivers.create') }}" class="btn btn-success mb-2">Create New Driver</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <!-- Add other attributes here if needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drivers as $driver)
                <tr>
                    <td>{{ $driver->Dno }}</td>
                    <!-- Add other attributes here if needed -->
                    <td>
                        <a href="{{ route('drivers.show', $driver->Dno) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('drivers.edit', $driver->Dno) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('drivers.destroy', $driver->Dno) }}" method="POST" style="display: inline;">
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
