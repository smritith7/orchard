<form action="{{ route('backend.sales.update', $sale->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Date</label>
        <input type="number" class="form-control" id="date" name="date" value="{{ old('date', $sale->date) }}" required>
    </div>

    <div class="form-group">
        <label for="name">Customer Name</label>
        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name', $sale->customer_name) }}" required>
    </div>

    <div class="form-group">
        <label for="name">Phone No</label>
        <input type="text" class="phone_no" id="phone_no" name="phone_no" value="{{ old('phone_no', $sale->phone_no) }}" required>
    </div>

    <div class="form-group">
        <label for="total">Total</label>
        <input type="number" class="form-control" id="total" name="total" value="{{ old('total', $sale->total) }}" required>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Pending" {{ old('status', $sale->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Paid" {{ old('status', $sale->status) == 'Paid' ? 'selected' : '' }}>Paid</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
