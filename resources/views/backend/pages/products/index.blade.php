@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <h2>Products</h2>

        <div class="d-flex justify-content-end my-2">
            <a href="{{ route('backend.products.create') }}" class="btn btn-primary">Add Product</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        {{--<td>image</td> --}}
                        <td>
                            <a href="{{ route('backend.products.show', ['id' => $product->id]) }}"
                                class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('backend.products.edit', ['id' => $product->id]) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('backend.products.destroy', ['id' => $product->id]) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
