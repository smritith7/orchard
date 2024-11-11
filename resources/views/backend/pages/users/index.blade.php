@extends('backend.layouts.main')

@section('content')

    <div class="container mt-5">

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

        <div class="row align-items-center">
            <div class="col d-flex justify-content-between">
                <h3 class="mb-0 font-weight-bold text-dark">Users Table</h3>
                <button class="btn btn-primary ml-3 btn-shadow" data-toggle="modal" data-target="#registrationModal">
                    Create User
                </button>
            </div>
        </div>

        <div class="card shadow mt-4">
            <div class="card-body">

                <!-- Registration Modal -->
                <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog"
                    aria-labelledby="registrationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center bg-secondary text-dark">
                                <h4 class="modal-title font-weight-bold">Register New Users</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="color: white;">×</button>
                            </div>
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
                                    {{-- <div class="form-group">
                                        <div class="dropdown  d-inline-block">
                                            <button
                                                class="btn btn-outline-secondary dropdown-toggle @error('role') is-invalid @enderror"
                                                type="button" id="roleDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                {{ old('role') ? ucfirst(old('role')) : 'Select Role' }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="roleDropdown" style="border: none;">
                                                <a class="dropdown-item" href="#"
                                                    onclick="selectRole('admin')">Admin</a>
                                                <a class="dropdown-item" href="#"
                                                    onclick="selectRole('manager')">Manager</a>
                                                <a class="dropdown-item" href="#"
                                                    onclick="selectRole('assistant')">Assistant</a>
                                            </div>
                                            <input type="hidden" name="role" id="role"
                                                value="{{ old('role') }}">
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div> --}}
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
                            {{-- <th>Role</th> --}}
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
                                {{-- <td>{{ ucfirst($user->role) }}</td> --}}
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

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


    {{-- role dropdown js --}}

    <script>
        function selectRole(role) {
            document.getElementById('role').value = role;
            document.getElementById('roleDropdown').innerText = role.charAt(0).toUpperCase() + role.slice(1);
            $('.dropdown-menu').removeClass('show');
        }
    </script>
@endsection
