@extends('backend.layouts.main')

@section('content')
    <div class="">
        <div class="d-flex justify-content-between w-100">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>

                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's
                        content.
                    </p>

                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>


                </div>


            </div>

             {{-- Logout Button on the right side --}}
             <div class="float-end"> <!-- or 'float-end' if you're using Bootstrap 5 -->
                <form class="auth__form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
