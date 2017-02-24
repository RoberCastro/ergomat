@extends('layouts.app')

@section('content')
  @include('layouts.errors')
  <div class="panel panel-default">
    <div class="panel-heading">Edit profile</div>
    <div class="panel-body">
      {{ Form::open(array('method' => 'PATCH', 'route' => array('user.update', $user->id))) }}

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group" style="padding-top: 50px;">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
      </div>
      <div class="col-md-6">
        {!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
      </div>

      {!! Form::close() !!}
    </div>

  </div>
@endsection
