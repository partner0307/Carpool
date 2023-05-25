@extends('layouts/contentLayoutMaster')

@section('title', 'General Settings')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
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
    <div class="card p-0">
        <div class="card-body">
            <ul class="nav nav-pills mb-0">
                <li class="nav-item">
                    <a class="nav-link active" id="general" data-bs-toggle="pill" href="#general-settings" aria-expanded="true"><i data-feather="home"></i>General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="business" data-bs-toggle="pill" href="#business-config" aria-expanded="false"><i data-feather="layers"></i>Business Config</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="bank" data-bs-toggle="pill" href="#bank-supported" aria-expanded="false"><i data-feather="layers"></i>Bank Supported</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="country" data-bs-toggle="pill" href="#country-currency"><i data-feather="layers"></i>Country & Currency</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="subscriptiontab" data-bs-toggle="pill" href="#subscription" aria-expanded="false"><i data-feather="layers"></i>Suscription</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="general-settings" aria-labelledby="general" aria-expanded="true">
          @include('content.settings.general-settings.general-settings')
        </div>
        <div class="tab-pane" id="business-config" role="tabpanel" aria-labelledby="business" aria-expanded="false">
            @include('content.settings.general-settings.business-config')
        </div>
        <div class="tab-pane" id="bank-supported" role="tabpanel" aria-labelledby="bank" aria-expanded="false">
            @include('content.settings.general-settings.bank-supported')
        </div>
        <div class="tab-pane" id="country-currency" role="tabpanel" aria-labelledby="country" aria-expanded="false">
            @include('content.settings.general-settings.country-currency')
        </div>
        <div class="tab-pane" id="subscription" role="tabpanel" aria-labelledby="subscription" aria-expanded="false">
            @include('content.settings.general-settings.subscription')
        </div>
    </div>
    @include('content.component.modal.bank-supported')
    @include('content.component.modal.subscription')
    @include('content.component.modal.country-currency')
@endsection
@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/settings/bank-supported.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/settings/country-currency.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/settings/subscription.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
