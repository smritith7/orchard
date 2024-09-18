@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <h2>Users Details</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $user->adminInfo->full_name ?? null }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <span class="card-text mb-2"><strong>Gender:</strong>{{ $user->adminInfo->gender ?? null }}</span>
                <span class="card-text mb-2"><strong>Phone_no:</strong>{{ $user->adminInfo->phone_no ?? null }}</span>
                <span class="card-text mb-2"><strong>Address:</strong>{{ $user->adminInfo->address ?? null }}</span>
                <span class="card-text mb-2"><strong>Nationality:</strong>{{ $user->adminInfo->nationality ?? null}}</span>
            </div>
        </div>

        <a href="{{ route('backend.users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit User</a>

        <form action="{{ route('backend.users.destroy', ['id' => $user->id]) }}" method="POST"
            style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this users?')">Delete users</button>
        </form>
    </div>
@endsection
