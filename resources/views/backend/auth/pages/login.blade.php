@extends('frontend.auth.layouts.main')
@section('title', 'login')

@section('content')
    <div class="auth">
        <div class="auth__header">
           
        </div>
        <div class="auth__body">
            <form class="auth__form" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="auth__form_body">
                    <h3 class="auth__form_title">Sign in</h3>
                    <div>
                        <div class="form-group">
                            <label class="text-uppercase small">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase small">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="">
                        <button class="mt-2 btn btn-primary btn-sm btn-block">
                            LOGIN
                        </button>

                        <div class="mt-2">

                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>

@endsection
