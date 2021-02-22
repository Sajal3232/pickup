@extends('layouts.master');
@section('title')
Pickup || Login
@endsection

@section('main_content')
<div class="login-b" style="margin-top:65px">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="login-logo" style="border:1px solid gray; background-color:#9cc16d;">
                <a href="{{url('/')}}" target="">Admin Login</a>
            </div>  
        </div>
        <div class="col-lg-6">
            <div class="login-logo" style="border:1px solid gray; background-color:#9cc16d;">
                <a href="{{url('/client')}}" target="">Client Login</a>
            </div>  
        </div>
    </div>
  </div>  
</div>
@endsection