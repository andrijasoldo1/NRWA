<div class="container">
    <h2>Edit Rental</h2>
    <form method="POST" action="{{ route('rentals.update', $rental->Rid) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Rdate" class="form-label">Date:</label>
            <input type="date" class="form-control" id="Rdate" name="Rdate" value="{{ $rental->Rdate }}">
        </div>
        <div class="mb-3">
            <label for="Amount" class="form-label">Amount:</label>
            <input type="text" class="form-control" id="Amount" name="Amount" value="{{ $rental->Amount }}">
        </div>
        <!-- Add more input fields as needed -->

        <button type="submit" class="btn btn-primary">Update Rental</button>
    </form>
</div>


