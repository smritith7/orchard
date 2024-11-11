@extends('frontend.auth.layouts.main')

@section('content')
    <div class="container">
        <nav class="d-flex justify-content-between align-items-center mt-2">
            <h5 class="mb-0">
                <a href="/" class="text-primary" style="text-decoration:none">Orchard</a>
            </h5>
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
        </nav>
        <hr>

        {{-- Recent Products --}}
        <section>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>

              </div>

                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                {{-- <div class="card-body">



                    @foreach ($products ?? [] as $product)
                        <div>
                            <p><b>{{ $product->name }}</b></p>
                        </div>
                    @endforeach
                </div> --}}
            </div>


        </section>
    </div>
@endsection
