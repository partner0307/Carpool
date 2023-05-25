@extends('layouts/fullLayoutMaster')

@section('title', 'Admin Login')

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
<div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Admin Signin -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="#" class="brand-logo">
          <h2 class="brand-text text-primary ms-1">vamunu</h2>
        </a>

        <h4 class="card-title mb-1">Welcome! 👋</h4>
        <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

        <form class="auth-login-form mt-2 mb-5" id="admin-login" action="/" method="GET" autocomplete="off">
          <div class="mb-1">
            <label for="login-email" class="form-label">Email</label>
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="login-email"
              placeholder="johndoe@gmail.com"
              tabindex="1"
              autofocus
            />
          </div>

          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>
              <a href="{{url('forgot-password/1')}}">
                <small>Forgot Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="login-password"
                name="login-password"
                tabindex="2"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
              <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
          </div>
          <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
        </form>
      </div>
    </div>
    <!-- /Admin Signin -->
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
