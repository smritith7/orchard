@extends('backend.layouts.main')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">


            <form action="{{ route('backend.user.store') }}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">email</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-md-4 col-form-label text-md-end text-start">password</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="firstname" class="col-md-4 col-form-label text-md-end text-start">FirstName</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname"
                            name="firstname" value="{{ old('firstname') }}" required>
                        @if ($errors->has('firstname'))
                            <span class="text-danger">{{ $errors->first('firstname') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start">LastName</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname"
                            name="lastname" value="{{ old('lastname') }}" required>
                        @if ($errors->has('lastname'))
                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Gender" class="col-md-4 col-form-label text-md-end text-start">Gender</label>
                    <div class="col-md-6">
                        <select class="form-select form-select-lg form-control" name="Gender">
                            <option selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="phone_no" class="col-md-4 col-form-label text-md-end text-start">Phone_no
                    </label>
                    <div class="col-md-6">
                        <input type="phone_no" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no"
                            name="phone_no" value="{{ old('phone_no') }}" required>
                        @if ($errors->has('phone_no'))
                            <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="address" class="col-md-4 col-form-label text-md-end text-start">Address</label>
                    <div class="col-md-6">
                        <input type="address" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" required>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="role" class="col-md-4 col-form-label text-md-end text-start">Role</label>
                    <div class="col-md-6">
                        <select class="form-select form-select-lg form-control" name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="Nationality" class="col-md-4 col-form-label text-md-end text-start">Nationality</label>
                    <div class="col-md-6">
                        <select class="form-select form-select-lg form-control" name="Nationality">
                            <option selected>Select one</option>
                            <option value="nepali">Nepali</option>




                        </select>
                    </div>
                </div>








                <div class="mb-3 row">
                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                </div>

            </form>
        </div>

    </div>
@endsection
