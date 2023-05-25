@extends('layouts/contentLayoutMaster')

@section('title', 'Push Notification')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<div class="card">
    <div class="card-body p-3">
        <form id="editNotification">
            <div class="col-4 mb-4">
                <select id="type" name="type" class="form-select" data-msg='Please select type'>
                    <option value="">- Select Option -</option>
                    <option value="0">All</option>
                    <option value="1">User</option>
                </select>
            </div>
            <div class="col-12">
                <h4 class="mb-1">Push Notification</h4>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" data-msg='Please enter title.' />
                        </div>
                        <div class="col-6">
                            <label for="message" class="form-label">Message</label>
                            <input type="text" class="form-control" id="message" name="message" placeholder="Message" data-msg='Please enter message.' />
                        </div>
                    </div>
                    <div class="col-12 mt-2 pt-50 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                    </div>
                </div>
            </div>
        </form>
</div>
<div class="basic-datatable">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
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
    <script src="{{ asset(mix('js/scripts/settings/push-notification.js')) }}"></script>
@endsection
