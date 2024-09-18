@extends('backend.layouts.main')


@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('backend.chefs.create') }}" class="btn btn-primary">
            Create Chefs
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->chefInfo->full_name ?? null }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <a href="{{ route('backend.chefs.show', ['id' => $user->chefInfo->id]) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('backend.chefs.edit', ['id' => $user->chefInfo->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('backend.chefs.destroy', ['id' => $user->chefInfo->id]) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this chefs?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
