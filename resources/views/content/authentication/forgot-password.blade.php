@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Forgot Password')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
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
        <img class="img-fluid" src="{{asset('images/pages/forgot-password-v2-dark.svg')}}" alt="Forgot password V2" />
        @else
        <img class="img-fluid" src="{{asset('images/pages/forgot-password-v2.svg')}}" alt="Forgot password V2" />
        @endif
      </div>
    </div>
    <!-- /Left Text-->

    <!-- Forgot password-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">Forgot Password? 🔒</h2>
        <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
        <form class="auth-forgot-password-form mt-2" action="/auth/reset-password-cover" method="GET">
          <div class="mb-1">
            <label class="form-label" for="forgot-password-email">Email</label>
            <input class="form-control" id="forgot-password-email" type="text" name="forgot-password-email" placeholder="john@example.com" aria-describedby="forgot-password-email" autofocus="" tabindex="1" />
          </div>
          <button class="btn btn-primary w-100" tabindex="2">Send reset link</button>
        </form>
        <p class="text-center mt-2">
          @if ($flag == 1)
            <a href="{{url('admin/signin')}}">
                <i data-feather="chevron-left"></i> Back to login
            </a>
          @else
            <a href="{{url('company/signin')}}">
                <i data-feather="chevron-left"></i> Back to login
            </a>
          @endif
        </p>
      </div>
    </div>
    <!-- /Forgot password-->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/auth/forgot-password.js'))}}"></script>
@endsection
