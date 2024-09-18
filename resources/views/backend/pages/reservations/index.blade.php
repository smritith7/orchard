@extends('backend.layouts.main')

@section('content')
    <h1>Reservations Dashboard</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Guests</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
                <th>Status</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td> <span class="badge bg-primary text-dark p-2">{{ $reservation->no_of_guest }}</span></td>
                    <td>{{ $reservation->date->toFormattedDateString()  }}</td>
                    <td>{{ $reservation->time->format('h:i:s A') }}</td>
                    <td>{{ $reservation->message }}</td>
                    <td class="text-capitalize text-{{ $reservation->status === 'pending' ? 'yellow' : ($reservation->status === 'accepted' ? 'green' : 'red') }}">
                        {{ $reservation->status }}
                    </td>

                    <td class="d-flex justify-start" style="gap:5px;">
                        <a href="{{ route('backend.reservations.show', ['id' => $reservation->id]) }}"
                            class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('backend.reservations.edit', ['id' => $reservation->id]) }}"
                            class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('backend.reservations.destroy', ['id' => $reservation->id]) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
