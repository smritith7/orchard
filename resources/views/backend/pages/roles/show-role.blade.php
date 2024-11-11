@extends('backend.layouts.main')

@section('content')
    <div class="container mt-3">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Role Title --}}
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3 class="mb-3" style="font-weight: 600; color: #343a40; text-align: left;">
                        Role Details
                    </h3>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <form action="{{ route('backend.user.index', ['id' => $role->id]) }}" method="GET" style="display: inline-block;">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-primary shadow mb-3 ms-2">Back</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        {{-- Role Name --}}
                        <div class="card-name font-weight-bold" style="font-size: 1.5rem;">{{ $role->name }}</div>

                        {{-- Permissions List --}}
                        <strong>Permissions:</strong>
                        <ul>
                            @if ($role->permissions && $role->permissions->count())
                                @foreach ($role->permissions as $permission)
                                    <li>{{ ucfirst(str_replace('_', ' ', $permission->name)) }}</li>
                                @endforeach
                            @else
                                <li>No permissions assigned.</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
