@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Header Section --}}
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h3 class="mb-0" style="font-weight: 600; color: #343a40;">User Details</h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <form action="{{ route('backend.user.index', ['id' => $user->id]) }}" method="GET" style="display: inline-block;">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary shadow mb-3">Back</button>
                </form>
            </div>
        </div>

        {{-- Image Section --}}
        <div class="card shadow-lg">
            <div class="row no-gutters">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/avatar.jpeg') }}" alt="User Avatar" class="img-fluid rounded-circle" style="width: 50%; height: auto; object-fit: cover;">
                </div>

                {{-- Info Section --}}
                <div class="col-md-6">
                    <div class="card-body d-flex flex-column justify-content-between" style="padding: 20px;">
                        <div>
                            <h5 class="card-title mb-2" style="font-size: 2rem; font-weight: bold;">{{ $user->full_name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="card-text"><strong>Phone No:</strong> {{ $user->phone_no ?? 'N/A' }}</p>
                            {{-- <p class="card-text"><strong>Role:</strong> {{ ucfirst($user->role) ?? 'N/A' }}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
