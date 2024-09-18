@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <h2>chefs Details</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- {{dd($user)}} --}}
        <div class="card">
            <div class="card-body d-flex flex-column">
                <p class="card-text"><strong>Name: </strong> {{ $user->first_name??''." ".$user->first_name }}</p>
                <p class="card-text"><strong>Email </strong> {{ $user->user->email }}</p>
                <span class="card-text mb-2"><strong>Gender: </strong>{{ $user->gender ?? null }}</span>
                <span class="card-text mb-2"><strong>Phone_no: </strong>{{ $user->phone_no ?? null }}</span>

                <span class="card-text mb-2"><strong>level: </strong><div class="badge bg-primary text-capitalize">{{ $user->level ?? null}}</div></span>
            </div>
        </div>

        <a href="{{ route('backend.chefs.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit chef</a>

        <form action="{{ route('backend.chefs.destroy', ['id' => $user->id]) }}" method="POST"
            style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this chefs?')">Delete chefs</button>
        </form>
    </div>
@endsection
