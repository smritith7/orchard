@extends('backend.layouts.main')

@section('content')
<div class=" container mt-5">
    <h2>Create New User</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('backend.user.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" class="form-control @error('full_name') is-invalid @enderror"
                value="{{ old('full_name') }}" required>
            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="phone_no">Phone No:</label>
            <input type="tel" name="phone_no" id="phone_no" class="form-control @error('phone_no') is-invalid @enderror"
                value="{{ old('phone_no') }}" required>
            @error('phone_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                <option value="" selected>Select Role</option>
                <option value="assistant">Admin</option>
                <option value="manager">Manager</option>
                <option value="assistant">Assistant</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('password') }}" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Conform Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                value="{{ old('password') }}" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
