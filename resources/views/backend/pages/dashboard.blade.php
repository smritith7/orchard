@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between w-100 mb-4">
            <h2 class="text-primary">Dashboard</h2>
        </div>

        <div class="row">
            <!-- Total Visits Card -->
            <div class="col-md-3">
                <div class="card text-white mb-4" style="background: linear-gradient(135deg, #ff8c00, #ff4500); border-radius: 15px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fa-regular fa-eye"></i> Total Visits
                        </h5>
                        <p class="card-text display-4">14</p>
                    </div>
                </div>
            </div>
            <!-- Total Orders Card -->
            <div class="col-md-3">
                <div class="card text-white mb-4" style="background: linear-gradient(135deg, #1e90ff, #00bfff); border-radius: 15px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-shopping-cart"></i> Total Orders
                        </h5>
                        <p class="card-text display-4">20</p>
                    </div>
                </div>
            </div>
            <!-- Total Users Card -->
            <div class="col-md-3">
                <div class="card text-white mb-4" style="background: linear-gradient(135deg, #ff8c00, #ff4400); border-radius: 15px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fa-regular fa-eye"></i> Total Users
                        </h5>
                        <p class="card-text display-4">{{ $totalUsers }}</p> <!-- Display total number of users -->
                    </div>
                </div>
            </div>

            <!-- Total Revenue Card -->
            <div class="col-md-3">
                <div class="card text-white mb-4" style="background: linear-gradient(135deg, #ff69b4, #ff1493); border-radius: 15px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-dollar-sign"></i> Total Revenue
                        </h5>
                        <p class="card-text display-4">Rs.5000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Line Chart -->
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4>Sales Value</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart" style="width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" style="width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Product Table -->
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4>Products</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->custom_unit }} {{ $product->unit }}</td>
                                        <td>Nrs. {{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->stock > 0 ? $product->stock : 'Out of Stock' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No products found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- User Status Table -->
            {{-- <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4>User Status</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>User A</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>User B</td>
                                    <td><span class="badge bg-danger">Inactive</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>User C</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lineChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3],
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.4
                }]
            };

            const barChartData = {
                labels: ['Jul', 'Aug', 'Sept', 'Oct', 'Nov'],
                datasets: [{
                    label: 'Orders',
                    data: [5, 10, 15, 8, 20],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',

                    ],
                    borderWidth: 1
                }]
            };

            const lineChartConfig = {
                type: 'line',
                data: lineChartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            };

            const barChartConfig = {
                type: 'bar',
                data: barChartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            };

            const lineChart = new Chart(document.getElementById('lineChart'), lineChartConfig);
            const barChart = new Chart(document.getElementById('barChart'), barChartConfig);
        });
    </script>

@endsection
