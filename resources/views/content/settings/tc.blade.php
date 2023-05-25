@extends('layouts/contentLayoutMaster')

@section('title', 'T&C Page')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
@endsection

@section('content')
<div class="card">
    <div class="card-body p-3">
        <form id="editTC">
            <div class="col-12">
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="T&C" data-msg="Please enter T&C" />
                    </div>
                </div>
                <div class="row mb-1">
                    <label class="form-label" for="content">Content</label>
                    <div class="full-wrapper">
                        <div id="full-container">
                            <div class="editor"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2 pt-50 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/settings/tc.js')) }}"></script>
@endsection
