@extends('layouts/contentLayoutMaster')

@section('title', 'Faq')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
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
    <div class="card">
        <div class="card-body p-1">
            <ul class="nav nav-pills mb-0">
                <li class="nav-item">
                    <a class="nav-link active" id="faq-title" data-bs-toggle="pill" href="#titletab" aria-expanded="true"><i data-feather="home"></i>Title</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="faq-list" data-bs-toggle="pill" href="#listtab" aria-expanded="false"><i data-feather="layers"></i>List Faq</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="titletab" aria-labelledby="faq-title" aria-expanded="true">
          @include('content.settings.faq.title')
        </div>
        <div class="tab-pane" id="listtab" role="tabpanel" aria-labelledby="faq-list" aria-expanded="false">
          @include('content.settings.faq.faqlist')
        </div>
    </div>
@endsection
@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/settings/faq.js')) }}"></script>
@endsection
