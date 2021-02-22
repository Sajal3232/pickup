@extends('layouts.master');
@section('title')
Pickup || Login
@endsection

@section('main_content')

<div class="login-box" style="background-color: #9cc16d;">
<span>your Id: {{$clientId}}</span>
  <div class="login-logo">
    <a href="{{url('/')}}" target="_blank"><b>Licence </b> create</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>

      <form action="{{url('/key/save')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <label for="">Client Id</label>
          <input style="margin-left:40px;" type="text" class="form-control{{ $errors->has('clientID') ? ' is-invalid' : '' }}" name="clientID" value="{{$clientId}}" placeholder="clientID">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('clientID'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('clientID') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group mb-3">
          <label for="">Licence Key</label>
          <input type="text" style="margin-left:16px;" class="form-control{{ $errors->has('licencekey') ? ' is-invalid' : '' }}" name="license_key" value="{{$encryptedkey}}" placeholder="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('licencekey'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('licencekey') }}</strong>
                </span>
            @endif
        </div>
          <div class="col-4">
            <button style="margin-left: 120px;" type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
          </div>

        <!-- <div class="row" style="margin-top: 10px;">
          <div class="col-lg-6">
            <div class="icheck-primary">
              <label for="remember">
                Licence For
              </label>
            </div>
          </div>
          <div class="col-lg-6">
            <Select name="months">
              <option value="">==Select Month===</option>
              <option value="1">3 Month</option>
              <option value="2">6 Month</option>
              <option value="3">12 Month</option>
            </Select>
          </div>
        </div> -->

        <!-- <div class="row" style="margin-top: 10px;">
          <div class="col-lg-8">
            
          </div>
          <div class="col-lg-4" style="border: 1px solid;padding: 0px 6px;background: #dddcda;">
          <input type="submit" style="color: black;" value="Create Key">
          </div>
               
        </div> -->
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection