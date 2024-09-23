@extends('backend.layouts.main')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('backend.user.update', ['id' => $user->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Full Name:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="phone_no">Phone No:</label>
            <input type="tel" name="phone_no" id="phone_no" class="form-control @error('phone_no') is-invalid @enderror"
                   value="{{ old('phone_no', $user->phone_no) }}" required>
            @error('phone_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                <option value="admin" {{ $user->role == 'assistant' ? 'selected' : '' }}>Admin</option>
                <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="assistant" {{ $user->role == 'assistant' ? 'selected' : '' }}>Assistant</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep the current password">
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
