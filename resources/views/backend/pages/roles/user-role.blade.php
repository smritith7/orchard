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
                    <!-- Title and Create Role -->
                    <div class="col-md-6 d-flex align-items-center">
                        <h5 class="m-0" style="font-weight: 500; font-size: 1.5rem; color: #343a40;">Create Role</h5>
                        <button class="btn btn-primary ml-3 btn-shadow" data-toggle="modal" data-target="#CreateroleModal">
                            Create Role
                        </button>
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
                                <form action="" method="POST"> <!-- Ensure this route exists -->
                                    @csrf
                                    <div class="form-group">
                                        <label for="roleName">Title</label>
                                        <input type="text" class="form-control" id="roleName" name="role_name" required>
                                    </div>
                                    <div class="form-group">
                                        <h5>Permissions</h5>
                                        <div class="row">
                                             <!-- right column -->
                                            <div class="col-md-6 pr-3 pl-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_users" name="permissions[]" value="manage_users">
                                                    <label class="form-check-label" for="manage_users">Manage Users</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_roles" name="permissions[]" value="manage_roles">
                                                    <label class="form-check-label" for="manage_roles">Manage Roles</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_customer_profiles" name="permissions[]" value="manage_customer_profiles">
                                                    <label class="form-check-label" for="manage_customer_profiles">Manage Customer Profiles</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_products" name="permissions[]" value="manage_products">
                                                    <label class="form-check-label" for="manage_products">Manage Products</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_product_attributes" name="permissions[]" value="manage_product_attributes">
                                                    <label class="form-check-label" for="manage_product_attributes">Manage Product Attributes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_orders" name="permissions[]" value="manage_orders">
                                                    <label class="form-check-label" for="manage_orders">Manage Orders</label>
                                                </div>
                                            </div>

                                            <!-- Right column -->

                                            <div class="col-md-6 pl-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_finance" name="permissions[]" value="manage_finance">
                                                    <label class="form-check-label" for="manage_finance">Manage Finance</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_customer_feedback/reviews" name="permissions[]" value="manage_customer_feedback/reviews">
                                                    <label class="form-check-label" for="manage_customer_feedback/reviews">Manage Customer Feedback/Reviews</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id=" manage_customer_inquiries" name="permissions[]" value="manage_customer_inquiries">
                                                    <label class="form-check-label" for="manage_customer_inquiries">Manage Customer Inquiries</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="view_order_history" name="permissions[]" value="view_order_history">
                                                    <label class="form-check-label" for="view_order_history">View Order History</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="view_reports" name="permissions[]" value="view_reports">
                                                    <label class="form-check-label" for="view_reports">View Reports</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="manage_settings" name="permissions[]" value="manage_settings">
                                                    <label class="form-check-label" for="manage_settings">Manage Settings</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Roles Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm btn-shadow">View</a>
                                    <a href="" class="btn btn-info btn-sm btn-shadow">Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-shadow" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <!-- Pagination Links -->
                <div class="mt-3 d-flex justify-content-center">
                    {{-- {{ $roles->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
