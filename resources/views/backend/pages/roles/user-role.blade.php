@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mt-4">
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col-md-6 d-flex align-items-center">
                        <h5 class="m-0" style="font-weight: 500; font-size: 1.5rem; color: #343a40;">Create Role</h5>
                        <button class="btn btn-primary ml-3 btn-shadow" data-toggle="modal" data-target="#CreateroleModal">
                            Create Role
                        </button>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form method="GET" action="{{ route('backend.roles.user-role') }}" class="d-flex me-2">
                            <div class="input-group">
                                <input id="search-input" type="search" name="search"
                                    value="{{ request()->get('search') }}" class="form-control" placeholder="Search"
                                    style="width: 200px; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                <button id="search-button" type="submit"
                                    class="btn btn-outline-secondary btn-shadow search-btn"
                                    style="border: 1px solid #ced4da; background-color: transparent; height: 38px; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Create Role Modal -->
                <div class="modal fade" id="CreateroleModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center bg-secondary text-dark">
                                <h4 class="modal-title font-weight-bold">Create User Role</h4>
                                <button type="button" class="close" data-dismiss="modal" style="color: white;">×</button>
                            </div>
                            <div class="modal-body">
                                <!-- Ensure the action points to the route handling the role creation -->
                                <form action="{{ route('backend.roles.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="roleName">Title</label>
                                        <input type="text" class="form-control" id="roleName" name="title" required> <!-- Changed name to "title" -->
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col d-flex align-items-center">
                                            <h5 class="mr-3">Permissions</h5>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="selectAll">
                                                <label class="form-check-label" for="selectAll">Select All</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-md-6 pr-3 pl-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_users" name="permissions[]" value="manage_users">
                                                <label class="form-check-label" for="manage_users">Manage Users</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_roles" name="permissions[]" value="manage_roles">
                                                <label class="form-check-label" for="manage_roles">Manage Roles</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_customer_profiles" name="permissions[]"
                                                    value="manage_customer_profiles">
                                                <label class="form-check-label" for="manage_customer_profiles">Manage
                                                    Customer Profiles</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_products" name="permissions[]" value="manage_products">
                                                <label class="form-check-label" for="manage_products">Manage
                                                    Products</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_product_attributes" name="permissions[]"
                                                    value="manage_product_attributes">
                                                <label class="form-check-label" for="manage_product_attributes">Manage
                                                    Product Attributes</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_orders" name="permissions[]" value="manage_orders">
                                                <label class="form-check-label" for="manage_orders">Manage Orders</label>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6 pl-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_finance" name="permissions[]" value="manage_finance">
                                                <label class="form-check-label" for="manage_finance">Manage
                                                    Finance</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_customer_feedback/reviews" name="permissions[]"
                                                    value="manage_customer_feedback/reviews">
                                                <label class="form-check-label"
                                                    for="manage_customer_feedback/reviews">Manage Customer
                                                    Feedback/Reviews</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_customer_inquiries" name="permissions[]"
                                                    value="manage_customer_inquiries">
                                                <label class="form-check-label" for="manage_customer_inquiries">Manage
                                                    Customer Inquiries</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="view_order_history" name="permissions[]"
                                                    value="view_order_history">
                                                <label class="form-check-label" for="view_order_history">View Order
                                                    History</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="view_reports" name="permissions[]" value="view_reports">
                                                <label class="form-check-label" for="view_reports">View Reports</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox"
                                                    id="manage_settings" name="permissions[]" value="manage_settings">
                                                <label class="form-check-label" for="manage_settings">Manage
                                                    Settings</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-shadow">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Roles Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style= "width: 20%";>S.N</th>
                            <th style= "width: 50%";>Title</th>
                            <th style= "width: 30%";>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role)
                            <tr>
                                <td>{{ $roles->firstItem() + $index }}</td>
                                <td>{{ $role->title }}</td>
                                <td>
                                    <a href="{{route('backend.roles.show', $role->id) }}" class="btn btn-success btn-sm btn-shadow">View</a>
                                    <a href="{{route('backend.roles.edit', $role->id) }}" class="btn btn-info btn-sm btn-shadow">Edit</a>
                                    <form action="{{ route('backend.roles.destroy', $role->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-shadow"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-center">
                    {{ $roles->links('Backend.pagination.page-pagination') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles for Button Shadows and Hover Effects -->
    <style>
        .btn-shadow {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.2s ease;
        }

        .btn-shadow:hover {
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.15);
        }

        .search-btn:hover {
            background-color: #007bff !important;
            color: white !important;
            border-color: #007bff !important;
        }
    </style>

    <!-- Script for Select All Checkbox -->
    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.permission-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>


@endsection
