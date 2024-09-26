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
                    <!-- Title and Create User -->
                    <div class="col-md-6 d-flex align-items-center">
                        <h5 class="m-0" style="font-weight: 500; font-size: 1.5rem; color: #343a40;">Users List</h5>
                        <button class="btn btn-primary ml-3 btn-shadow" data-toggle="modal" data-target="#registrationModal">
                            Create User
                        </button>
                    </div>

                    <!-- Search Form -->
                    <div class="col-md-6 d-flex justify-content-end">
                        <form method="GET" action="{{ route('backend.user.index') }}" class="d-flex me-2">
                            <div class="input-group">
                                <!-- Search Input Field -->
                                <input id="search-input" type="search" name="search"
                                    value="{{ request()->get('search') }}" class="form-control" placeholder="Search"
                                    style="width: 200px; border-top-right-radius: 0; border-bottom-right-radius: 0;">

                                <!-- Search Button -->
                                <button id="search-button" type="submit"
                                    class="btn btn-outline-secondary btn-shadow search-btn"
                                    style="border: 1px solid #ced4da; background-color: transparent; height: 38px; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Registration Modal -->
                <div class="modal fade" id="registrationModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header justify-content-center bg-secondary text-dark">
                                <h4 class="modal-title font-weight-bold">Register New Users</h4>
                                <button type="button" class="close" data-dismiss="modal" style="color: white;">×</button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form action="{{ route('backend.user.store') }}" method="POST" class="p-3">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="full_name">Full Name:</label>
                                            <input type="text" name="full_name" id="full_name"
                                                class="form-control @error('full_name') is-invalid @enderror"
                                                value="{{ old('full_name') }}" required>
                                            @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone_no">Phone No:</label>
                                            <input type="tel" name="phone_no" id="phone_no"
                                                class="form-control @error('phone_no') is-invalid @enderror"
                                                value="{{ old('phone_no') }}" required>
                                            @error('phone_no')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="role">Role:</label>
                                            <select name="role" id="role"
                                                class="form-select @error('role') is-invalid @enderror" required>
                                                <option value="" selected>Select Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="manager">Manager</option>
                                                <option value="assistant">Assistant</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password:</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            required>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

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
                            <th>Role</th>
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
                                <td>{{ ucfirst($user->role) }}</td>
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
                                <td colspan="6" class="text-center">No Users Found</td>
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

    <!-- Custom Styles for Button Shadows and Hover Effects -->
    <style>
        .btn-shadow {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.2s ease;
            /* Smooth transition */
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
@endsection
