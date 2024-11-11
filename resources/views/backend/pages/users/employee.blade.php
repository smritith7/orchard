@extends('backend.layouts.main')

@section('content')

    <div class="container mt-5">

        <!-- Display Errors and Success Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Title and Create User Button -->
        <div class="row align-items-center">
            <div class="col d-flex justify-content-between">
                <h3 class="mb-0 font-weight-bold text-dark">Employees</h3>
                <input type="hidden" name="role" value="employee">
                <button class="btn btn-primary ml-3 btn-shadow" data-toggle="modal" data-target="#registrationModal">
                    Create User
                </button>
            </div>
        </div>

        <!-- User Table Card -->
        <div class="card shadow mt-4">
            <div class="card-body">

                <!-- Registration Modal -->
                <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog"
                     aria-labelledby="registrationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center bg-secondary text-dark">
                                <h4 class="modal-title font-weight-bold">Register New User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('backend.user.store') }}" method="POST" class="p-3">
                                    @csrf
                                    <!-- Name and Phone -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="full_name">Full Name:</label>
                                            <input type="text" name="full_name" id="full_name" autocomplete="off"
                                                   class="form-control @error('full_name') is-invalid @enderror"
                                                   value="{{ old('full_name') }}" required>
                                            @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone_no">Phone No:</label>
                                            <input type="tel" name="phone_no" id="phone_no" autocomplete="off"
                                                   class="form-control @error('phone_no') is-invalid @enderror"
                                                   value="{{ old('phone_no') }}" required>
                                            @error('phone_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email and Password -->
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" id="email" autocomplete="off"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password" autocomplete="off"
                                               class="form-control @error('password') is-invalid @enderror" required>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password:</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               autocomplete="off"
                                               class="form-control @error('password_confirmation') is-invalid @enderror"
                                               required>
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Role Selection Dropdown -->
                                    <div class="form-group">
                                        <label for="role">Role:</label>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="roleDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                Select Role
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="roleDropdown">
                                                <a class="dropdown-item" href="#" onclick="selectRole('admin')">Admin</a>
                                                <a class="dropdown-item" href="#" onclick="selectRole('employee')">Employee</a>
                                                <a class="dropdown-item" href="#" onclick="selectRole('customer')">Customer</a>
                                            </div>
                                            <input type="hidden" name="role" id="role" value="customer" required>
                                        </div>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Register Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger btn-shadow"
                                                style="width: 150px;">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Table -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_no }}</td>
                            <td>
                                <a href="{{ route('backend.user.show', $user->id) }}"
                                   class="btn btn-success btn-sm btn-shadow">View</a>
                                <a href="{{ route('backend.user.edit', $user->id) }}"
                                   class="btn btn-info btn-sm btn-shadow">Edit</a>
                                <form action="{{ route('backend.user.destroy', $user->id) }}" method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-shadow"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Users Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-3 d-flex justify-content-center">
                    {{ $users->links('Backend.pagination.page-pagination') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Role Dropdown JavaScript -->
    <script>
        function selectRole(role) {
            document.getElementById('role').value = role;
            document.getElementById('roleDropdown').innerText = role.charAt(0).toUpperCase() + role.slice(1);
        }

        $('#registrationModal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset(); // Reset the form
            document.getElementById('roleDropdown').innerText = 'Select Role'; // Reset dropdown display text
        });
    </script>

@endsection
