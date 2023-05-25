
@extends('layouts/contentLayoutMaster')

@section('title', 'Company Analytics')

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
<section id="company-analytics">
    <h3>Bienvenida, Mark</h3>
    <h6>This is the company summary for EI Pais</h6>
    <div class="row match-height">

        <div class="col-xl-7 col-md-6 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body row">
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="d-flex justify-content-between">
                            <div class="col-7">
                                <h5>Company Ranking</h5>
                                <p class="card-text font-small-3">This is your position with respect to other companies.</p>
                            </div>
                            <div class="d-flex align-items-end justify-content-end col-5">
                                <h2 class="mb-0 fw-bolder" style="color: #054752">N<sup>o</sup></h2>
                                <p style="font-size:48px;color: #054752"><strong>15</strong></p>
                            </div>
                        </div>
                        <div class="mt-3 ms-3">
                            <small class="ms-2">Complete the trips to go up in the ranking</small>
                            <div class="progress progress-bar-success mt-1" style="height: 6px">
                                <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small>15</small>
                                <small>16</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <img src="{{asset('images/illustration/ranking.svg')}}" class="congratulation-medal" alt="Medal Pic" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-md-6 col-12">
            <div class="card earnings-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title mb-1">Platform used</h4>
                            <div class="mt-3 ms-3">
                                <div class="form-check form-check-danger mb-1">
                                    <input type="radio" id="customColorRadio5" name="customColorRadio5" class="form-check-input" checked />
                                    <label class="form-check-label" for="customColorRadio5">Android</label>
                                </div>
                                <div class="form-check form-check-primary">
                                    <input type="radio" id="customColorRadio3" name="customColorRadio3" class="form-check-input" checked />
                                    <label class="form-check-label" for="customColorRadio3">iOS</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div id="platform-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
            <div class="card earnings-card">
            <div class="card-body">
                <h5>Savings in CO<sub>2</sub> emissions</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="mt-5">
                            <div class="font-small-4">This Month</div>
                            <h4>453.3<small>kg</small></h4>
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <div id="co-chart"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5>kilometers traveled</h5>
                    <div id="avg-sessions-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-tiny-line-stats">
                <div class="card-body pb-50">
                    <h6>Gas online savings</h6>
                    <h2 class="fw-bolder mb-1">6,24k</h2>
                    <div id="statistics-profit-chart"></div>
                </div>
            </div>
        </div>
    </div>
</section>
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
    <script src="{{ asset(mix('js/scripts/dashboard/company-analytics.js')) }}"></script>
@endsection
