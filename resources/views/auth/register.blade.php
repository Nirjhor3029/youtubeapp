{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!-- Register Modal HTML -->
 <div id="registerModal" class="modal fade">
   <div class="modal-dialog modal-login">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Register To Ayojok</h4>
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       </div>
       <div class="modal-body">
         <form method="POST" action="{{ route('register') }}">
           {{ csrf_field() }}

           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Your Username" required autofocus>

               @if ($errors->has('name'))
                   <span class="invalid-feedback" onclick="vanishErrorMessage(this)">
                       <strong>{{ $errors->first('name') }}</strong>
                   </span>
               @endif
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
               <input id="useremail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Your Email" required>

               @if ($errors->has('email'))
                   <span class="invalid-feedback" onclick="vanishErrorMessage(this)">
                       <strong>{{ $errors->first('email') }}</strong>
                   </span>
               @endif
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-phone"></i></span>
               <input id="usercontact" type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ old('contact') }}" placeholder="Your Contact Number" required>

               @if ($errors->has('email'))
                   <span class="invalid-feedback" onclick="vanishErrorMessage(this)">
                       <strong>{{ $errors->first('email') }}</strong>
                   </span>
               @endif
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
               <input id="userpassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

               @if ($errors->has('password'))
                   <span class="invalid-feedback" onclick="vanishErrorMessage(this)">
                       <strong>{{ $errors->first('password') }}</strong>
                   </span>
               @endif
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
             </div>
           </div>
           <div class="form-group">
             <button type="registerSubmit" class="btn btn-primary btn-block btn-lg">{{ __('Sign Up') }}</button>
           </div>

         </form>
       </div>
       <div class="modal-footer"><p class="hint-text"><a href="{{ route('password.request') }}">Forgot Password?</a></p></div>
     </div>
   </div>
 </div>
 <!--Register Modal HTML-->

<script>
    function vanishErrorMessage(ob){
        //alert("ok");
        ob.style.display = "none";
    }
</script>