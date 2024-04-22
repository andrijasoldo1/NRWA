<div class="container">
    <h2>Create New Rental</h2>
    <form method="POST" action="{{ route('rentals.store') }}">
        @csrf
        <div class="mb-3">
            <label for="Rdate" class="form-label">Date:</label>
            <input type="date" class="form-control" id="Rdate" name="Rdate" value="{{ old('Rdate') }}">
        </div>
        <div class="mb-3">
            <label for="Amount" class="form-label">Amount:</label>
            <input type="text" class="form-control" id="Amount" name="Amount" value="{{ old('Amount') }}">
        </div>
        <div class="mb-3">
            <!-- Drop-down for selecting driver -->
            <label for="Dno" class="form-label">Driver:</label>
            <select class="form-select" id="Dno" name="Dno">
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->Dno }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <!-- Drop-down for selecting vehicle -->
            <label for="Vehicle_id" class="form-label">Vehicle:</label>
            <select class="form-select" id="Vehicle_id" name="Vehicle_id">
                @foreach ($cars as $car)
                    <option value="{{ $car->Vehicle_id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Rental</button>
    </form>
</div>
