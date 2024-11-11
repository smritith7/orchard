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
                <h3 class="mb-0 text-primary">Sales Table</h3>
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
                            <th>Date</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->product_id }}</td>
                                <td>{{ $sale->customer_id }}</td>
                                <td>{{ $sale->total }}</td>
                                <td>{{ $sale->status }}</td>
                                <td>
                                    <a href="{{ route('backend.sales.show', $sale->id) }}" class="btn btn-sm btn-success">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($sales->isEmpty())
                    <!-- No Data Message Below the Table -->
                    <div class="alert alert-warning mt-3" role="alert">
                        No sales data available.
                    </div>
                @endif

                <!-- Pagination -->
                {{-- <div class="mt-3 d-flex justify-content-center">
                    {{ $sales->links('backend.pagination.page-pagination') }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
