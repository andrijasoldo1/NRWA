<form method="POST" action="{{ route('cars.update', $car->Vehicle_id) }}">

    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="license_no" class="form-label">License No:</label>
        <input type="text" class="form-control" id="license_no" name="license_no" value="{{ $car->License_no }}">
    </div>

    <div class="mb-3">
        <label for="model" class="form-label">Model:</label>
        <input type="text" class="form-control" id="model" name="model" value="{{ $car->Model }}">
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Year:</label>
        <input type="text" class="form-control" id="year" name="year" value="{{ $car->Year }}">
    </div>

    <div class="mb-3">
        <label for="ctype" class="form-label">Type:</label>
        <input type="text" class="form-control" id="ctype" name="ctype" value="{{ $car->Ctype }}">
    </div>

    <div class="mb-3">
        <label for="drate" class="form-label">Daily Rate:</label>
        <input type="text" class="form-control" id="drate" name="drate" value="{{ $car->Drate }}">
    </div>

    <div class="mb-3">
        <label for="wrate" class="form-label">Weekly Rate:</label>
        <input type="text" class="form-control" id="wrate" name="wrate" value="{{ $car->Wrate }}">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <input type="text" class="form-control" id="status" name="status" value="{{ $car->Status }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Car</button>
</form>
