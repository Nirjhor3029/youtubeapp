<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Youtube App</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body style="background:url('{{asset('superadmin/dist/img/bg-footer.jpg')}}')">

  <div class="container mt-5">
    {{--<div class="col-lg-12 text-center">
      <img src="{{asset('superadmin/dist/img/logo-transparent.png')}}" alt="Ayojok Logo" style="height:8rem;">
    </div>--}}
    <div class="row justify-content-center " style="margin-top: 10%">
      <div class="col-md-8" >
        <div class="card">
          <div class="card-header">{{ __('Admin Login') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('admin.login.submit') }}">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                    <span class="invalid-feedback">
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
                    <span class="invalid-feedback">
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
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>

                  {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a> --}}
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>
<!-- Modal HTML -->
{{-- <div id="myModal" class="modal fade">
<div class="modal-dialog modal-login">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Sign In To Ayojok</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<form method="POST" action="{{ route('login') }}">
@csrf

<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

@if ($errors->has('email'))
<span class="invalid-feedback">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock"></i></span>
<input input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

@if ($errors->has('password'))
<span class="invalid-feedback">
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
<div class="form-group">
<button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Sign In') }}</button>
<button type="submit" class="btn btn-primary btn-block btn-lg" data-dismiss="modal" data-toggle="modal" href="#registerModal">Register Now</button>
</div>

</form>
</div>
<div class="modal-footer"><p class="hint-text"><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p></div>
</div>
</div>
</div> --}}
<!--Login Modal HTML-->
