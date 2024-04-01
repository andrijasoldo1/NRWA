<div class="container">
    <h2>Create New Driver</h2>
    <form method="POST" action="{{ route('drivers.store') }}">
        @csrf
        <div class="mb-3">
            <label for="Dno" class="form-label">Driver ID:</label>
            <input type="text" class="form-control" id="Dno" name="Dno" value="{{ old('Dno') }}">
        </div>
        <!-- Dodajte više polja ako je potrebno -->

        <button type="submit" class="btn btn-primary">Create Driver</button>
    </form>
</div>
