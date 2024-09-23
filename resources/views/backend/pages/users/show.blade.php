@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <h2>User Details</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $user->full_name }}</h5>
                <p class="card-text mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text mb-1"><strong>Phone No:</strong> {{ $user->phone_no ?? 'N/A' }}</p>
                <p class="card-text mb-1"><strong>Role:</strong> {{ $user->role ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('backend.user.edit', ['id' => $user->id]) }}" class="btn btn-info">Edit User</a>

            <form action="{{ route('backend.user.destroy', ['id' => $user->id]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>
            </form>
        </div>
    </div>
@endsection
