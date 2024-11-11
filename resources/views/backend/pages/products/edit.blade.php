@extends('backend.layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h2 class="m-0">Edit Product</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('backend.products.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Product Name --}}
                    <div class="form-group">
                        <label for="name">Name:
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>

                    {{-- Price and Unit Fields --}}
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-3">
                            <label for="price">Price and unit:
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nrs.</span>
                                </div>
                                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="unit">Unit:</label>
                            <div class="input-group">
                                <input type="number" name="custom_unit" id="custom_unit" class="form-control w-75" value="{{ old('custom_unit', $product->custom_unit) }}" step="0.5" min="0.5" max="10">
                                <div class="input-group-append">
                                    <select name="unit" id="unit" class="form-control" style="width: 80px;" required>
                                        <option value="kg" {{ old('unit', $product->unit) == 'kg' ? 'selected' : '' }}>kg</option>
                                        <option value="g" {{ old('unit', $product->unit) == 'g' ? 'selected' : '' }}>g</option>
                                        <option value="lb" {{ old('unit', $product->unit) == 'lb' ? 'selected' : '' }}>lb</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="stock">Stock:
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="number" name="stock" id="stock" class="form-control"
                                    value="{{ old('stock', $product->stock) }}" required>
                            </div>
                        </div>
                    </div>

                    {{-- Description Field --}}
                    <div class="form-group mb-4">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="5" id="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    {{-- Current Image Display --}}
                    <div class="form-group">
                        <label>Current Image:</label><br>
                        <img src="{{ asset('images/' . $product->image) }}" style="width: 10%; height: auto; object-fit: cover;" alt="Product Image">

                    </div>

                    {{-- Image Upload Field --}}
                    <div class="form-group col-md-6">
                        <label for="img">Change Image:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="file-name" placeholder="No file chosen" readonly>
                            <div class="input-group-append">
                                <input type="file" name="img" id="img" class="form-control-file" style="display:none" onchange="updateFileName()">
                                <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('img').click();">Browse</button>
                            </div>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary shadow">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript to Update File Name -->
    <script>
        function updateFileName() {
            const fileInput = document.getElementById('img');
            const fileNameDisplay = document.getElementById('file-name');
            if (fileInput.files.length > 0) {
                fileNameDisplay.value = fileInput.files[0].name;
            } else {
                fileNameDisplay.value = 'No file chosen';
            }
        }
    </script>
@endsection
