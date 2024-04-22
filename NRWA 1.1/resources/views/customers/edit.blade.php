<div class="container">
    <h2>Edit Customer</h2>
    <form method="POST" action="{{ route('customers.update', $customer->Cid) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fname" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="fname" name="Fname" value="{{ $customer->Fname }}">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="Lname" value="{{ $customer->Lname }}">
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile:</label>
            <input type="text" class="form-control" id="mobile" name="Mobile" value="{{ $customer->Mobile }}">
        </div>
        <div class="mb-3">
            <label for="dno" class="form-label">Driver ID:</label>
            <input type="text" class="form-control" id="dno" name="Dno" value="{{ $customer->Dno }}">
        </div>
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehicle ID:</label>
            <input type="text" class="form-control" id="vehicle_id" name="Vehicle_id" value="{{ $customer->Vehicle_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
