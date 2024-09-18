@extends('backend.pages.users.create')
@section("title","register")
@section('content')


<div class="auth">
    <div class="auth__header">

    </div>
    <div class="auth__body">
        <form class="auth__form" autocomplete="off">
            <div class="auth__form_body">
                <h3 class="auth__form_title">Sign in</h3>
                <div>
                    <div class="form-group">
                        <label class="text-uppercase small">Firstname</label>
                        <input type="name" class="form-control" placeholder="Enter your FirstName">
                    </div>

                    <div class="form-group">
                        <label class="text-uppercase small">Lastname</label>
                        <input type="name" class="form-control" placeholder="Enter your LastName">
                    </div>



                    <div class="mb-3">
                        <label for="" class="form-label">Gender</label>
                        <select
                            class="form-select form-select-lg"
                            name="gender">
                            <option selected>Select one</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text-uppercase small">Phone_no</label>
                        <input type="phone_no" class="form-control" placeholder="Enter your Phone_no">
                    </div>

                    <div class="form-group">
                        <label class="text-uppercase small">Address</label>
                        <input type="address" class="form-control" placeholder="Enter your Address">
                    </div>

                    <div class="form-group">
                        <label class="text-uppercase small">Nationality</label>
                        <input type="nationality" class="form-control" placeholder="Enter your Nationality">
                    </div>
                </div>
            </div>
            <div class="auth__form_actions">
                <button class="btn btn-primary btn-lg btn-block">
                    Register Now
                </button>

        </form>

    </div>
</div>

@endsection
