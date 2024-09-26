@extends('backend.layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h2 class="m-0">Edit User</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('backend.user.update', ['id' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    {{-- Edit user Form --}}
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="full_name">Full Name:</label>
                            <input type="text" name="full_name" id="full_name"
                                class="form-control @error('full_name') is-invalid @enderror"
                                value="{{ old('full_name', $user->full_name) }}" required>
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone_no">Phone No:</label>
                        <input type="tel" name="phone_no" id="phone_no"
                            class="form-control @error('phone_no') is-invalid @enderror"
                            value="{{ old('phone_no', $user->phone_no) }}" required>
                        @error('phone_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role">Role:</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="assistant" {{ $user->role == 'assistant' ? 'selected' : '' }}>Assistant</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Leave blank to keep the current password">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary shadow">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
