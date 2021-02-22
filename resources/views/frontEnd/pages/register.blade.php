@extends('layouts.master');
@section('title')
Pickup || Login
@endsection

@section('main_content')
<div class="login-box">
  <div class="login-logo" style="background-color:#9cc16d">
    <a href="{{url('/')}}" target="_blank"><b>Client </b> Register</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="{{url('/save')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" placeholder="First Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('firstName'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstName') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" placeholder="Last Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('lastName'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control{{ $errors->has('organization') ? ' is-invalid' : '' }}" name="organization" value="{{ old('organization') }}" placeholder="Organization">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('organization'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('organization') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" placeholder="Street">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('street'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('street') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" placeholder="City">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group mb-3">
          <input type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}"  name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" value="{{ old('confirm_password') }}"  name="confirm_password" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if($message=Session::get('message'))
            {{$message}}
         @endif
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            <label for="remember">
                Register Here
              </label>
              <a href="{{url('/client/register')}}">Click</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection