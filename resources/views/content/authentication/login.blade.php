@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  @endsection

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-cover">
  <div class="auth-inner row m-0">
    <!-- Brand logo-->
    <a class="brand-logo" href="#">
      <h2 class="brand-text text-primary ms-1">vamunu</h2>
    </a>
    <!-- /Brand logo-->

    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
      <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
        @if($configData['theme'] === 'dark')
          <img class="img-fluid" src="{{asset('images/pages/login-v2-dark.svg')}}" alt="Login V2" />
          @else
          <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" />
          @endif
      </div>
    </div>
    <!-- /Left Text-->

    <!-- Login-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">Welcome to vamo! 👋</h2>
        <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
        <form class="auth-login-form mt-2" id="company-login" action="/" method="GET">
          <div class="mb-1">
            <label class="form-label" for="login-email">Email</label>
            <input class="form-control" id="login-email" type="text" name="login-email" placeholder="johndoe@gmail.com" aria-describedby="login-email" autofocus="" tabindex="1" />
          </div>
          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>
              <a href="{{url("forgot-password/0")}}">
                <small>Forgot Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input class="form-control form-control-merge" id="login-password" type="password" name="login-password" placeholder="············" aria-describedby="login-password" tabindex="2" />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
              <label class="form-check-label" for="remember-me"> Remember Me</label>
            </div>
          </div>
          <button class="btn btn-primary w-100" tabindex="4">Login</button>
        </form>
      </div>
    </div>
    <!-- /Login-->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/auth/login.js'))}}"></script>
@endsection
