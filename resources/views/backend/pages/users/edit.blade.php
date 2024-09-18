@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <h2>Edit User</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('backend.users.update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" id="password" class="form-control"
                    value="{{ old('password', $user->password) }}" required>
            </div>

            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" name="first_name" id="firstname" class="form-control"
                    value="{{ old('firstname', $user->adminInfo->first_name) }}" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control"
                    value="{{ old('lastname', $user->adminInfo->last_name) }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>

                <select class="form-select form-select-lg form-control" name="Gender">
                    <option selected>Select Gender</option>
                    <option value="male" @if ($user->adminInfo->gender == 'male') selected @endif>Male</option>
                    <option value="female" @if ($user->adminInfo->gender == 'female') selected @endif>Female</option>

                </select>
            </div>


            <div class="form-group">
                <label for="phone_no">Phone_no:</label>
                <input type="phone_no" name="phone_no" id="phone_no" class="form-control"
                    value="{{ old('phone_no', $user->adminInfo->phone_no) }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="address" name="address" id="address" class="form-control"
                    value="{{ old('address', $user->adminInfo->address) }}" required>
            </div>




            <div class="form-group">
                <label for="nationality">Nationality</label>

                <select class="form-select form-select-lg form-control" name="Nationality">
                    <option selected>Select Nationality</option>
                    <option value="nepali" @if ($user->adminInfo->nationality == 'nepali') selected @endif>Nepali</option>


                </select>
            </div>






            <button type="submit" class="btn btn-primary">Update user</button>
        </form>
    </div>
@endsection
