@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between w-100 mb-4">
            <h2 class="text-primary">Reports</h2>
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
            <!-- Pie Chart -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4>Sales (Pie Chart)</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="piechart" style="width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Polar Area Chart -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4>Sales Market</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="polarareachart" style="width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Doughnut Chart -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-white">
                        <h4>Sales Report</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="doughnutchart" style="width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Pie Chart Data
            const pieChartData = {
                labels: ['Red', 'Blue', 'Yellow'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            document.addEventListener("DOMContentLoaded", function() {
                // Pie Chart Initialization
                const pieChartConfig = {
                    type: 'pie',
                    data: pieChartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Sales Distribution'
                            }
                        }
                    }
                };

                // Line Chart Data
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

                // Bar Chart Data
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

                // Chart Configurations
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

                // Polar Area Chart Data
                const polarAreaChartData = {
                    labels: ['Red', 'Green', 'Yellow', 'Blue', 'Purple'],
                    datasets: [{
                        label: 'My Second Dataset',
                        data: [11, 16, 7, 3, 14],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                        ]
                    }]
                };

                // Doughnut Chart Data
                const doughnutChartData = {
                    labels: ['Red', 'Blue', 'Yellow'],
                    datasets: [{
                        label: 'My Third Dataset',
                        data: [300, 50, 100],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                        ]
                    }]
                };

                // Create Charts
                const pieChart = new Chart(document.getElementById('piechart'), pieChartConfig);
                const lineChart = new Chart(document.getElementById('lineChart'), lineChartConfig);
                const barChart = new Chart(document.getElementById('barChart'), barChartConfig);
                const polarAreaChart = new Chart(document.getElementById('polarareachart'), {
                    type: 'polarArea',
                    data: polarAreaChartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Polar Area Chart'
                            }
                        }
                    }
                });
                const doughnutChart = new Chart(document.getElementById('doughnutchart'), {
                    type: 'doughnut',
                    data: doughnutChartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Doughnut Chart'
                            }
                        }
                    }
                });
            });
        </script>
        <style>
            .hover-scale-shadow {
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .hover-scale-shadow:hover {
                transform: scale(1.05);
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
            }
        </style>
    </div>
@endsection
