<div id="levnum" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Leave Number</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login.save') }}">
        {{ csrf_field() }}

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input id="num" type="text" class="form-control{{ $errors->has('num') ? ' is-invalid' : '' }}" name="num" value="{{ old('num') }}" required autofocus>

              @if ($errors->has('num'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('num') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <button type="submit" id="levnumber" class="btn btn-primary btn-block btn-lg">{{ __('Submit') }}</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!--leave Phone Modal HTML-->
