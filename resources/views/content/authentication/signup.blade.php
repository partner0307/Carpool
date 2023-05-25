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
<div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Register basic -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="#" class="brand-logo">
          <h2 class="brand-text text-primary ms-1">vamunu</h2>
        </a>

        <h4 class="card-title mb-1">Register admin 🚀</h4>
        <p class="card-text mb-2">Make your app management easy and fun!</p>

        <form class="auth-register-form mt-2" id="admin-register" autocomplete="off">
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
            <label for="register-email" class="form-label">Email</label>
            <input
              type="text"
              class="form-control"
              id="register-email"
              name="register-email"
              placeholder="johndoe@gmail.com"
              aria-describedby="register-email"
              tabindex="2"
            />
          </div>

          <div class="mb-1">
            <label for="register-password" class="form-label">Password</label>

            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="register-password"
                name="register-password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="register-password"
                tabindex="3"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="register-privacy-policy" tabindex="4" />
              <label class="form-check-label" for="register-privacy-policy">
                I agree to <a href="#">privacy policy & terms</a>
              </label>
            </div>
          </div>
          <button class="btn btn-primary w-100" tabindex="5">Sign up</button>
        </form>

        <p class="text-center mt-2">
          <span>Already have an account?</span>
          <a href="{{url('admin/signin')}}">
            <span>Sign in instead</span>
          </a>
        </p>
      </div>
    </div>
    <!-- /Register basic -->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset(mix('vendors/js/extensions/toastr.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/auth/register.js')}}"></script>
@endsection
