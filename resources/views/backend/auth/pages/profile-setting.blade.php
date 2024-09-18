@extends('backend.layouts.main')
@section('content')

<div class="auth">
    <div class="auth__header">

    </div>

    <div class="form-group">
        <label class="text-uppercase small">UserName</label>
        <input type="name"  class="form-control" placeholder="Enter your Username">
    </div>

    <div class="form-group">
        <label class="text-uppercase small">Email</label>
        <input type="name" class="form-control" placeholder="Enter your Email">
    </div>

    <div class="form-group">
        <label class="text-uppercase small">Phone_no</label>
        <input type="phone_no" class="form-control" placeholder="Enter your Phone_no">
    </div>

    <div class="form-group">
        <label class="text-uppercase small">Address</label>
        <input type="address" class="form-control" placeholder="Enter your Address">
    </div>

    <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
            Update Profile
        </button>
    </div>


</div>





@endsection()
