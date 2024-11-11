@extends('frontend.layouts.main')

@section('content')
    <div class="container mt-5">
        <h1>Products</h1>

        @if($products->count() > 0)
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/' . $product->image) }}" class="card-img" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <p class="card-text"><strong>Price:</strong> Nrs. {{ number_format($product->price, 2) }}</p>
                                        <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                                        <p class="card-text"><strong>Unit:</strong> {{ $product->unit }}</p>
                                        <div class="d-flex justify-content-between">
                                            <!-- Add to Cart and Buy Now buttons -->
                                            <a href="{{ route('backend.add_to_cart', ['id' => $product->id]) }}" class="btn btn-primary">Add to Cart</a>
                                            <a href="{{ route('checkout') }}" class="btn btn-success">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No products available.</p>
        @endif
    </div>
@endsection
