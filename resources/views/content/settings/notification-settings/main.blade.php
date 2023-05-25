@extends('layouts/contentLayoutMaster')

@section('title', 'Notification Settings')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
    <ul class="nav nav-pills mb-5">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#email-provider" aria-expanded="true"><i data-feather="user"></i>Email Provider</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#templates" aria-expanded="false"><i data-feather="lock"></i>Templates</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#email-logs" aria-expanded="false"><i data-feather="flag"></i>Email Logs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#push-logs"><i data-feather="bell"></i>Push Logs</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="email-provider">
          @include('content.settings.notification-settings.email-provider')
        </div>
        <div class="tab-pane" id="templates" role="tabpanel">
          @include('content.settings.notification-settings.templates')
        </div>
        <div class="tab-pane" id="email-logs" role="tabpanel">
          @include('content.settings.notification-settings.email-logs')
        </div>
        <div class="tab-pane" id="push-logs" role="tabpanel">
          @include('content.settings.notification-settings.push-logs')
        </div>
    </div>
    @include('content.component.modal.email-provider')
@endsection
@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/settings/email-provider.js')) }}"></script>
@endsection
