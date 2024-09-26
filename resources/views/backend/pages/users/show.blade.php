@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- user-detail --}}

        <div class="card shadow mb-4">
            <div class="card-header">
                <h2 class="m-0">User Detail</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="card-title font-weight-bold" style="font-size: 1.5rem;">{{ $user->full_name }}</div>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><strong>Phone No:</strong> {{ $user->phone_no ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Role:</strong> {{ ucfirst($user->role) ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 text-md-right mb-3">
                        <img src="{{ asset('path/to/user-avatar.png') }}" alt="User Avatar" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    </div>
                </div>
            </div>

        </div>
        <div class=" text-end">
            <a href="{{ route('backend.user.edit', ['id' => $user->id]) }}" class="btn btn-info shadow">Edit User</a>

            <form action="{{ route('backend.user.destroy', ['id' => $user->id]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger shadow ms-2"
                    onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>
            </form>
        </div>
    </div>


@endsection
