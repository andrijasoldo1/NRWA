<div class="container">
    <h2>Edit Driver</h2>
    <form method="POST" action="{{ route('drivers.update', $driver->Dno) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Dno" class="form-label">Driver ID:</label>
            <input type="text" class="form-control" id="Dno" name="Dno" value="{{ $driver->Dno }}">
        </div>
        <!-- Dodajte više polja ako je potrebno -->

        <button type="submit" class="btn btn-primary">Update Driver</button>
    </form>
</div>
