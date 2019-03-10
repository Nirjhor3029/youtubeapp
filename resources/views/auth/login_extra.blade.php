@extends('layouts.app')

@push('css')

@endpush

@section('content')
  <!-- Masthead -->
<header class="pagehead" style="background-image: url({{asset('img/backgrounds/bg-footer.jpg')}});">
  <div class="container">
    <div class="row">
      <div class="col-12 my-auto text-center text-white">
        <img class="pagehead-img img-responsive mb-3" src="{{asset('img/ayojok-logo-transparent.png')}}" alt=""/>
      </div>
    </div>
  </div>
</header>
<!--/ End of Masthead -->

<!-- Content section -->
<section class="page-section mt-5 mb-5">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header" style="background-color:rgba(255,136,30,0.7); color:white;"><h5>{{ __('Login') }}</h5></div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                          <div class="form-group row">
                              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" onclick="vanishErrorMessage(this)">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="invalid-feedback" onclick="vanishErrorMessage(this)">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-secondary">
                                      {{ __('Login') }}
                                  </button>

                                  <a class="btn btn-secondary" href="{{ route('password.request') }}">
                                      {{ __('Forgot Your Password?') }}
                                  </a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
    function vanishErrorMessage(ob){
        //alert("ok");
        ob.style.display = "none";
    }
</script>

@endpush
