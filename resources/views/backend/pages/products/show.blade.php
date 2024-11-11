@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h3 class="mb-0" style="font-weight: 600; color: #343a40;">Product Details</h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <form action="{{ route('backend.products.index', ['id' => $product->id]) }}" method="GET"
                    style="display: inline-block;">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary shadow mb-3">Back</button>
                </form>
            </div>
        </div>
        {{-- Image Section --}}
        <div class="card shadow-lg">
            <div class="row no-gutters">
                <div class=" col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/' . $product->image) }}" style="width: 80%; height: auto; object-fit: cover;"
                        alt="Product Image">
                </div>
                {{-- Info Section --}}
                <div class="col-md-6">
                    <div class="card-body d-flex flex-column justify-content-between" style="padding: 20px;">
                        <div>
                            <h5 class="card-title mb-2" style="font-size: 2rem; font-weight: bold;">{{ $product->name }}
                            </h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text" style="color: grey;">{{ $product->stock }} <span>Stock available </span></p>
                            <p class="card-text">
                                <strong>Price:</strong> Rs. {{ number_format($product->price, 0) }}
                                @if ($product->unit == 'kg')
                                <span>per kg</span>
                            @endif

                            </p>

                            <div class="form-group d-flex align-items-center">
                                <input type="number" name="custom_unit" id="custom_unit" class="form-control w-50 mx-2"
                                    value="{{ old('custom_unit') ?? 1 }}" step="0.5" min="0.5" max="10">
                            </div>
                        </div>

                        <!-- Button Section -->
                        <div class="mt-3 mb-4 d-flex">
                            <button type="button" class="btn btn-success w-25 mr-2">Buy Now</button>
                            <button type="button" class="btn btn-primary w-25">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
