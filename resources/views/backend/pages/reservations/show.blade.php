@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <h1>Reservation Details</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class ="card-body">
                <h5 class="card-title">{{ $reservation->name }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $reservation->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $reservation->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $reservation->phone }}</p>
                <p class="card-text"><strong>Guest no:</strong>
                    <span class="badge bg-warning ms-4 p-2">{{ $reservation->no_of_guest }}</span>
                </p>
                <p class="card-text"><strong>Date:</strong> {{ $reservation->date }}</p>
                <p class="card-text"><strong>Time:</strong> {{ $reservation->time }}</p>
                <p class="card-text"><strong>Message:</strong> {{ $reservation->message }}</p>
                <p class="card-text"><strong>Status:</strong>
                    <span class="badge bg-primary">{{ $reservation->status }}</span>
                </p>
                <form method="post" action="{{ route('backend.reservations.update', ['id' => $reservation->id]) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="form-group d-flex">
                            <select class="form-select form-select-lg form-control w-auto" name="status">
                                <option {{ $reservation->status == 'pending' ? 'selected' : '' }} value="pending">Pending
                                </option>
                                <option {{ $reservation->status == 'accepted' ? 'selected' : '' }} value="accepted">
                                    Accepted</option>
                                <option {{ $reservation->status == 'rejected' ? 'selected' : '' }} value="rejected">
                                    Rejected</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- <a href="{{ route('backend.reservations.edit', ['id' => $reservation->id]) }}" class="btn btn-warning">Edit Reservation</a>

        <form action="{{ route('backend.reservations.destroy', ['id' => $reservation->id]) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete reservation</button>
        </form>
    </div>  --}}

        <a href="{{ route('backend.reservations.index') }}"><button type="submit" class="btn btn-primary">Back to
                Dashboard</button></a>
    @endsection
