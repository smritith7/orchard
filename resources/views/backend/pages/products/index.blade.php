@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Header Row -->
        <div class="row align-items-center">
            <div class="col d-flex justify-content-between">
                <h3 class="mb-0 text-primary">Products Table</h3>
                <!-- Product Modal Button -->
                <a href="{{ route('backend.products.create') }}" class="btn btn-primary ml-3 btn-shadow">
                    Add Product
                </a>
            </div>
        </div>

        <!-- Product Table Card -->
        <div class="card shadow mt-4">
            <div class="card-body">

                <!-- Products Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->custom_unit }} {{ $product->unit }}</td>
                                <td>Nrs. {{ number_format($product->price, 2) }}</td>
                                <td>
                                    <a href="{{ route('backend.products.show', ['id' => $product->id]) }}" class="btn btn-sm btn-success">View</a>
                                    <a href="{{ route('backend.products.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('backend.products.destroy', ['id' => $product->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3 d-flex justify-content-center">
                    {{ $products->links('Backend.pagination.page-pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
