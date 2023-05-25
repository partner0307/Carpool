
@extends('layouts/contentLayoutMaster')

@section('title', 'Admin Analytics')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Admin Analytics Starts -->
<section id="admin-analytics">
  <div class="row match-height">
    <!-- Earnings Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card earnings-card">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h4 class="card-title mb-1">Earnings</h4>
              <div class="font-small-2">This Month</div>
              <h5 class="mb-1">${{$total_earning}}</h5>
              <p class="card-text text-muted font-small-2">
                <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
              </p>
            </div>
            <div class="col-6">
              <div id="earnings-chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Earnings Card -->

    <!-- Statistics Card -->
    <div class="col-xl-8 col-md-6 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0 users-count"></h4>
                  <p class="card-text font-small-2 mb-0">Users</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0 seats-count"></h4>
                  <p class="card-text font-small-2 mb-0">Seats</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">2</h4>
                  <p class="card-text font-small-1 mb-0">Vehicle Type</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0 revenue-count"></h4>
                  <p class="card-text font-small-2 mb-0">Revenue</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Card -->
  </div>

  <div class="row match-height">
    <div class="col-lg-4 col-12">
      <div class="row match-height">
        <!-- Bar Chart - Cancelled -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card">
            <div class="card-body pb-50 pe-50">
              <h6>Cancelled</h6>
              <h2 class="fw-bolder mb-1 cancelled-rides"></h2>
              <div class="d-flex justify-content-end">
                <div class="avatar bg-light-danger">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Bar Chart - Cancelled -->

        <!-- Line Chart - Started -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50 pe-50">
              <h6>Started</h6>
              <h2 class="fw-bolder mb-1 started-rides"></h2>
              <div class="d-flex justify-content-end">
                <div class="avatar bg-light-danger">
                    <div class="avatar-content">
                      <i data-feather="box" class="avatar-icon"></i>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Line Chart - Started -->

        <!-- Bar Chart - Complete -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card">
            <div class="card-body pb-50 pe-50">
              <h6>Complete</h6>
              <h2 class="fw-bolder mb-1 completed-rides"></h2>
              <div class="d-flex justify-content-end">
                <div class="avatar bg-light-danger">
                    <div class="avatar-content">
                      <i data-feather="box" class="avatar-icon"></i>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Bar Chart - Complete -->

        <!-- Line Chart - Pending -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50 pe-50">
              <h6>Pending</h6>
              <h2 class="fw-bolder mb-1 pending-rides"></h2>
              <div class="d-flex justify-content-end">
                <div class="avatar bg-light-danger">
                    <div class="avatar-content">
                      <i data-feather="box" class="avatar-icon"></i>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Line Chart - Pending -->
      </div>
    </div>

    <!-- Revenue Report Card -->
    <div class="col-lg-8 col-12">
        <div class="card card-revenue-budget">
            <div class="row mx-0">
            <div class="col-md-8 col-12 revenue-report-wrapper">
                <div class="d-sm-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-50 mb-sm-0">Ride Statistics With Respect To Time</h4>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-flex-start me-2">
                            <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                        <span>Seats</span>
                        </div>
                        <div class="d-flex align-items-flex-start ms-75">
                            <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                            <span>CO<sub>2</sub></span>
                        </div>
                    </div>
                </div>
                <div id="revenue-report-chart"></div>
            </div>
            <div class="col-md-4 col-12 budget-wrapper">
                <div class="btn-group">
                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        2022
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">2022</a>
                        <a class="dropdown-item" href="#">2021</a>
                        <a class="dropdown-item" href="#">2020</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <span class="fw-bolder me-25">Total Seats:</span>
                </div>
                <h2 class="mt-25">25,852</h2>
                <div class="revenue-25 d-flex justify-content-center">
                    <span class="fw-bolder me-25">Total Co2:</span>
                </div>
                <h2 class="mt-25">32,386kg</h2>
            </div>
            </div>
        </div>
    </div>
    <!--/ Revenue Report Card -->
  </div>

  <div class="row match-height">
    <!-- Company Table Card -->
    <div class="col-12">
        <h4 class="mt-3">Recent Rides Carpool</h4>
        <div class="card card-company-table">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="datatables-basic table mt-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Seats</th>
                                <th>Trip Type</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ Company Table Card -->
  </div>
</section>
<!-- Admin Analytics ends -->
@include('content.component.modal.invoice')
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/dashboard/admin-analytics.js')) }}"></script>
@endsection
