@extends('backend.layouts.main')
@section('content')
    <div class="container">
        <h2>Create New Product</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('backend.products.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            {{--<div class="form-group">
                <label for="description">Description:</label>
<input type="file" name="img" id="">
            </div> --}}



            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
