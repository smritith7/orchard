@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <h2>Product Details</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
            </div>
        </div>

        <a href="{{ route('backend.products.edit', ['id' => $product->id]) }}" class="btn btn-warning">Edit Product</a>

        <form action="{{ route('backend.products.destroy', ['id' => $product->id]) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
        </form>
    </div>
@endsection
