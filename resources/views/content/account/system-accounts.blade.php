@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('vendor-style')
  <!-- Vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<h3>Roles List</h3>
<div class="d-flex justify-content-between align-items-center mb-2">
    <p class="mb-0">
    A role provided access to predefined menus and features so that depending <br />
    on assigned role an administrator can have access to what he need
    </p>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#admin-user" id="addUser"><i data-feather="plus" class="me-1"></i>Add User</button>
</div>

<!-- Role cards -->
<div class="row">
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <span>Total <span class="admin-count"></span> users</span>
          <ul class="list-unstyled d-flex align-items-center avatar-group admin-avatar-group mb-0">
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
          <div class="role-heading">
            <h4 class="fw-bolder">Administrator</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <span>Total <span class="company-count"></span> users</span>
          <ul class="list-unstyled d-flex align-items-center avatar-group company-avatar-group mb-0">
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
          <div class="role-heading">
            <h4 class="fw-bolder">Company</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Role cards -->

<h3 class="mt-50">Total users with their roles</h3>
<p class="mb-2">Find all of your company’s administrator accounts and their associate roles.</p>
<!-- table -->
<div class="card">
  <div class="table-responsive">
    <table class="user-list-table table">
      <thead class="table-light">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@include('content.component.modal.admin-user')

@endsection

@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/account/system-accounts.js')) }}"></script>
@endsection
