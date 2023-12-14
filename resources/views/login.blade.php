@extends('layouts.main')


@section('title')
    Login
@endsection

@section('content')

<section class="vh-100 bg-light" >
  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10 ">
        <div class="card"  style="border-radius: 1rem 1rem 1rem 1rem;">
          <div class="row g-0 shadow-lg " style="border-radius: 1rem 1rem 1rem 1rem;">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <video class="img-fluid" style="border-radius: 1rem 0 0 1rem;"  autoplay loop muted>
              <source src="{{asset('images/ved1.mp4')}}" type="video/mp4" /></video>
            </div>
            <!-- <div class="ratio ratio-16x9">
  <iframe src="{{asset('images/ved1.mp4')}}" title="YouTube video" allowfullscreen></iframe>
</div> -->
            <div class="col-md-6 col-lg-7 d-flex align-items-center border" style="border-radius: 0 1rem 1rem 0;">
              <div class="card-body p-4 p-lg-5 text-black">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0">SOIL</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                  <div class="form-outline mb-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                      value="{{ old('email') }}" required autocomplete="off" autofocus>                       
                    <label class="form-label" for="form2Example17">Email address</label>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"name="password" 
                      required autocomplete="off">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4 text-center">
                    <button class="btn btn-dark btn-lg btn-block w-100 " type="submit">Login</button>
                  </div>
                  <a class="small text-muted" href="#!">Forgot password?</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop