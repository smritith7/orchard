@extends('backend.layouts.main')
@section('content')
    <div class="container">
        <h2>Create New Product</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="container mt-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h2 class="m-0">Create Product</h2>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('backend.products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Field -->

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') }}" required>
                        </div>

                        <!-- Price and Unit Input Row -->
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="price">Price:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nrs.</span>
                                    </div>
                                    <input type="number" name="price" id="price" class="form-control"
                                        value="{{ old('price') }}" required>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="unit">Unit:</label>
                                <div class="input-group">
                                    <input type="number" name="custom_unit" id="custom_unit" class="form-control w-75" value="{{ old('custom_unit') }}" step="0.5" min="1" max="10">
                                    <select name="unit" id="unit" class="form-control" style="width: 80px; border-radius: 0; box-shadow: none;" required>
                                        <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>kg</option>
                                        <option value="g" {{ old('unit') == 'g' ? 'selected' : '' }}>g</option>
                                        <option value="lb" {{ old('unit') == 'lb' ? 'selected' : '' }}>lb</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- Description Field -->
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group col-md-6">
                            <label for="img">Image:</label>
                            <div class="input-group">
                                <input type="text" class="form-control bg-white" id="file-name" placeholder="No file chosen" readonly>
                                <div class="input-group-append">
                                    <input type="file" name="img" id="img" class="form-control-file" style="display:none" required onchange="updateFileName()">
                                    <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('img').click();">Browse</button>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary shadow">Create</button>
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
            if (fileInput.files.length > 0) {
                fileNameDisplay.value = fileInput.files[0].name;
            } else {
                fileNameDisplay.value = 'No file chosen';
            }
        }
    </script>
@endsection
