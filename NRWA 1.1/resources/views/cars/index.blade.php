<div class="container">
    <h2>Car List</h2>
    <a href="{{ route('cars.create') }}" class="btn btn-success mb-2">Create New Car</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>License No</th>
                <th>Model</th>
                <th>Year</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->Vehicle_id }}</td>
                    <td>{{ $car->License_no }}</td>
                    <td>{{ $car->Model }}</td>
                    <td>{{ $car->Year }}</td>
                    <td>{{ $car->Ctype }}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->Vehicle_id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('cars.edit', $car->Vehicle_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car->Vehicle_id) }}" method="POST" style="display: inline;">
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
