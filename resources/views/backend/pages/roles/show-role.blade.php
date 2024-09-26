@extends('backend.layouts.main')

@section('content')
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Role Detail --}}

        <div class="card shadow mb-4">
            <div class="card-header">
                <h2 class="m-0">Role Detail</h2>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="card-title font-weight-bold" style="font-size: 1.5rem;">{{ $role->title }}</div>


                        <strong>Permissions:</strong>
                        <ul>
                            @if ($role->permissions)
                                @foreach (json_decode($role->permissions) as $permission)
                                    <li>{{ ucfirst(str_replace('_', ' ', $permission)) }}</li>
                                @endforeach
                            @else
                                <li>No permissions assigned.</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete and Edit button --}}
        <div class="text-end">
            <a href="{{ route('backend.roles.edit', ['id' => $role->id]) }}" class="btn btn-info shadow">Edit Role</a>

            <form action="{{ route('backend.roles.destroy', ['id' => $role->id]) }}" method="POST"
                style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger shadow">Delete Role</button>
            </form>
        </div>

    </div>
@endsection
