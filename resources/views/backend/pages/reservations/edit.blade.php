@extends('backend.layouts.main')

@section('content')
    <h1>Edit Reservation</h1>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form method="post" action="{{ route('backend.reservations.update', ['id'=> $reservation->id]) }}">
        @csrf
        @method('put')

        <!-- Add your form fields here with current reservation data -->


        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ old('name', $reservation->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text"name="email" id="email" class="form-control"
                value="{{ old('email', $reservation->email) }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text"name="phone" id="phone" class="form-control"
                value="{{ old('phone', $reservation->phone) }}" required>
        </div>
        <div class="form-group">
            <label for="guest ">Guest:</label>
            <input type="number" name="guest" id="guest" class="form-control"
                value="{{  $reservation->no_of_guest}}" required>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control"
                value="{{ old('date', $reservation->date) }}" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" class="form-control"
                value="{{ old('time', $reservation->time) }}" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <input type="text"name="message" id="message" class="form-control"
                value="{{ old('message', $reservation->message) }}" required>
        </div>

       {{-- <div class="form-group">
            <label for="message">Status:</label>
            <input type="text"name="status" id="status" class="form-control"
                value="{{ old('status', $reservation->status) }}" required>
        </div> --}}

        <div class="form-group">
            <label for="Status" >Status:</label>
            <div class="form-group">
                <select class="form-select form-select-lg form-control" name="status">
                    <option>Select Status</option>
                    <option {{$reservation->status=='accepted'?'selected':''}} value="accepted">Accepted</option>
                    <option {{$reservation->status=='rejected'?'selected':''}} value="rejected">Rejected</option>

                </select>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>

     <a href="{{ route('backend.reservations.index') }}" button type="submit" class="btn btn-sm"> </button>Back to Dashboard</a>

@endsection
