@extends('backend.layouts.main')
@section('content')
    <div class="container">
        <h2>Create New Product</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="container mt-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h2 class="m-0">Create Product</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('backend.products.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name">Name: <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Please enter a valid name.</div>
                        </div>

                        <!-- Price and Unit Row -->
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="price">Price per unit: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nrs.</span>
                                    </div>
                                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" min="0.01" step="0.01" required>
                                    <div class="invalid-feedback">Please enter a valid price.</div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="stock">Stock (custom unit): <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="stock" id="stock" class="form-control w-50" value="{{ old('stock') }}" min="1" required>
                                    <select name="unit" id="unit" class="custom-select w-25" required>
                                        <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>kg</option>
                                        <option value="g" {{ old('unit') == 'g' ? 'selected' : '' }}>g</option>
                                        <option value="lb" {{ old('unit') == 'lb' ? 'selected' : '' }}>lb</option>
                                    </select>
                                    <div class="invalid-feedback">Please enter a valid stock amount.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="img">Image: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control bg-white" id="file-name" placeholder="No file chosen" readonly>
                                <div class="input-group-append">
                                    <input type="file" name="img" id="img" class="form-control-file d-none" accept="image/*" required onchange="updateFileName()">
                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('img').click();">Browse</button>
                                </div>
                                <div class="invalid-feedback">Please select a valid image file.</div>
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="form-group">
                            <label for="description">Description: <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" rows="4" class="form-control" minlength="10" required>{{ old('description') }}</textarea>
                            <div class="invalid-feedback">Please provide a description (at least 10 characters).</div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary shadow">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Update File Name -->
    <script>
        function updateFileName() {
            const fileInput = document.getElementById('img');
            const fileNameDisplay = document.getElementById('file-name');
            fileNameDisplay.value = fileInput.files.length ? fileInput.files[0].name : 'No file chosen';
        }

        // Bootstrap custom validation
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
