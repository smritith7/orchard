@extends('backend.layouts.main')


@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('backend.users.create') }}" class="btn btn-primary">
            Create User
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->adminInfo->full_name ?? null }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        <a href="{{ route('backend.users.show', ['id' => $user->id]) }}" class="btn btn-info">View</a>
                        <a href="{{ route('backend.users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('backend.users.destroy', ['id' => $user->id]) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this users?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
