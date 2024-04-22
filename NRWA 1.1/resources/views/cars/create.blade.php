<div class="container">
    <h2>Create New Car</h2>
    <form method="POST" action="{{ route('cars.store') }}">
        @csrf
        <div class="mb-3">
            <label for="license_no" class="form-label">License No:</label>
            <input type="text" class="form-control" id="license_no" name="License_no" value="{{ old('License_no') }}">
            @error('License_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model:</label>
            <input type="text" class="form-control" id="model" name="Model" value="{{ old('Model') }}">
            @error('Model')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year:</label>
            <input type="text" class="form-control" id="year" name="Year" value="{{ old('Year') }}">
            @error('Year')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ctype" class="form-label">Type:</label>
            <input type="text" class="form-control" id="ctype" name="Ctype" value="{{ old('Ctype') }}">
            @error('Ctype')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="drate" class="form-label">Daily Rate:</label>
            <input type="text" class="form-control" id="drate" name="Drate" value="{{ old('Drate') }}">
            @error('Drate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="wrate" class="form-label">Weekly Rate:</label>
            <input type="text" class="form-control" id="wrate" name="Wrate" value="{{ old('Wrate') }}">
            @error('Wrate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <input type="text" class="form-control" id="status" name="Status" value="{{ old('Status') }}">
            @error('Status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
