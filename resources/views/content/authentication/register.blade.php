@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

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
        <img class="img-fluid" src="{{asset('images/pages/register-v2-dark.svg')}}" alt="Register V2" />
        @else
        <img class="img-fluid" src="{{asset('images/pages/register-v2.svg')}}" alt="Register V2" />
        @endif
      </div>
    </div>
    <!-- /Left Text-->

    <!-- Register-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">Welcome 🚀</h2>
        <p class="card-text mb-2">Make your app management easy and fun!</p>
        <form class="auth-register-form mt-2" id="company-register" autocomplete="off" action="/" method="GET">
            <div class="col-12">
                <div class="row mb-1">
                    <div class="col-sm-12 col-md-6">
                        <label for="register-firstname" class="form-label">First name</label>
                        <input type="text" class="form-control" id="register-firstname" name="register-firstname" placeholder="John" tabindex="1" autofocus />
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="register-lastname" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="register-lastname" name="register-lastname" placeholder="Doe" tabindex="1" autofocus />
                    </div>
                  </div>
            </div>
            <div class="mb-1">
                <label class="form-label" for="register-email">Email</label>
                <input class="form-control" id="register-email" type="text" name="register-email" placeholder="john@example.com" aria-describedby="register-email" tabindex="2" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="company-name">Company Name</label>
                <input class="form-control" id="company-name" type="text" name="company-name" placeholder="Google" tabindex="2" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="register-password">Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                <input class="form-control form-control-merge" id="register-password" type="password" name="register-password" placeholder="············" aria-describedby="register-password" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
            </div>
            <div class="mb-1">
                <div class="form-check">
                <input class="form-check-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                <label class="form-check-label" for="register-privacy-policy">I agree to<a href="#">&nbsp;privacy policy & terms</a></label>
                </div>
            </div>
            <button class="btn btn-primary w-100" tabindex="5">Sign up</button>
        </form>
      </div>
    </div>
    <!-- /Register-->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/auth/register.js')}}"></script>
@endsection
