{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Incorrect Email Modal -->
    <div class="modal fade" id="myModal_2" role="dialog">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Warning !</h4>
                </div>
                <div class="modal-body text-center">
                    <p>Email already exist use different login method !! .</p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Login Modal HTML -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sign In To Ayojok</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus >

              @if ($errors->has('email'))
                  <span class="invalid-feedback" id="error" onclick="vanishErrorMessage(this)">
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
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg">{{ __('Sign In') }}</button>
            <button type="submit" class="btn btn-primary btn-block btn-lg" data-dismiss="modal" data-toggle="modal" href="#registerModal">Register Now</button>
          </div>
          <div class="text-center">
            <a href="{{url('login/google')}}" class="btn google"><i class="fa fa-google"></i> Google</a>
            <a href="{{url('login/facebook')}}" class="btn fb fa-fw"><i class="fa fa-facebook"></i> Facebook</a>
          </div>

          <div class="text-center mt-2">
            <p style="font-size:0.8rem; color:#f47f20;">Don't want to Register?</p>
            <button type="submit" class="btn btn-primary btn-block btn-lg" data-dismiss="modal" data-toggle="modal" href="#levnum">Leave Your Number</button>
          </div>
        </form>
      </div>
      <div class="modal-footer"><p class="hint-text"><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p></div>
    </div>
  </div>
</div>
<!--Login Modal HTML-->
<script>
    function vanishErrorMessage(ob){
        //alert("ok");
        ob.style.display = "none";
    }
</script>
