let earningsChart = document.querySelector('#earnings-chart');
let revenueReportChart = document.querySelector('#revenue-report-chart');
const earningsChartOptions = {
    chart: {
        type: 'donut',
        height: 120,
        toolbar: { show: false }
    },
    dataLabels: { enabled: false },
    series: [53, 100-53],
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: ['Earning', 'Remaining'],
    stroke: { width: 0 },
    colors: [window.colors.solid.success, '#28c76f33'],
    grid: {
        padding: {
            right: -20,
            bottom: -8,
            left: -20
        }
    },
    plotOptions: {
        pie: {
            startAngle: -0,
            donut: {
                labels: {
                    show: true,
                    name: { offsetY: 15 },
                    value: {
                        offsetY: -15,
                        formatter: function (val) { return parseInt(val) + '%' }
                    },
                    total: {
                        show: true,
                        offsetY: 15,
                        label: 'Earning',
                        formatter: function (w) { return 53 + '%' }
                    }
                }
            }
        }
    },
    responsive: [
        {
            breakpoint: 1325,
            options: {
                chart: { height: 100 }
            }
        },
        {
            breakpoint: 1200,
            options: {
                chart: { height: 120 }
            }
        },
        {
            breakpoint: 1045,
            options: {
                chart: { height: 100 }
            }
        },
        {
            breakpoint: 992,
            options: {
                chart: { height: 120 }
            }
        }
    ]
};
earningsChart = new ApexCharts(earningsChart, earningsChartOptions);
earningsChart.render();

const revenueReportChartOptions = {
    chart: {
        height: 140,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
    },
    plotOptions: {
        bar: {
            columnWidth: '15%',
            endingShape: 'rounded'
        },
        distributed: true
    },
    colors: [window.colors.solid.primary, window.colors.solid.warning],
    series: [
      {
            name: 'Seats',
            data: [95, 198, 140, 135, 100, 65, 125, 100, 70, 70, 130, 90]
      },
      {
            name: 'CO2',
            data: [-75, -190, -120, -115, -80, -45, -105, -75, -60, -55, -110, -70]
      }
    ],
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false
    },
    grid: {
        padding: {
            top: -10,
            bottom: -10
        },
        yaxis: {
            lines: { show: false }
        }
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        labels: {
            style: {
                colors: '#5e5873',
                fontSize: '0.86rem'
            }
        },
        axisTicks: {
            show: false
        },
        axisBorder: {
            show: false
        }
    },
    yaxis: {
        labels: {
            style: {
                colors: '#5e5873',
                fontSize: '0.86rem'
            }
        }
    }
};
revenueReportChart = new ApexCharts(revenueReportChart, revenueReportChartOptions);
revenueReportChart.render();

/**
 * DataTables Basic
 */

const getData = id => {
    $.get(`/apps/rides-carpool/edit/${id}`).then(res => {
        let initials = res.name.match(/\b\w/g) || [];
        initials = ((initials.shift() || '') + (initials.pop() || '')).toUpperCase();
        const output = res.photo ? `<img src="/storage/${res.photo}" alt="Avatar" width="32" height="32" />` : '<span class="avatar-content">' + initials + '</span>';
        $('#invoice-title-id, #invoice-id').text(res.id);
        $('#invoice-date').text(moment(res.date_issue).format('DD MMM YYYY'));
        $('#invoice-user-photo').html(output);
        $('#invoice-user-name').text(res.name);
        $('#invoice-user-email').text(res.email);
        $('#invoice-payment').text(res.payment);
        $('#invoice-pickup').text(res.pickup);
        $('#invoice-arrival').text(res.arrival);
        $('#invoice-trip-type').text(res.trip_type === 1 ? 'Single Trip' : 'Round Trip');
        $('#invoice-amount, #invoice-total').text(res.amount);
    })
}

$(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
        let cnt = 0;
        dt_basic_table.DataTable({
            ajax: {url: '/apps/rides-carpool/index', dataSrc: ''},
            columns: [
                { data: 'id' },
                { data: '' },
                { data: 'seats' },
                { data: 'trip_type', render: (data, type, full, meta) => {return data == 1 ? 'Single' : 'Round'} },
                { data: 'amount' },
                { data: 'status' },
                { data: '' }
            ],
            columnDefs: [
            { targets: 0 },
            { targets: 1,
                render: function (data, type, full, meta) {
                var $name = full['name'],
                    $email = full['email'],
                    $image = full['photo'];
                if ($image) {
                    // For Avatar image
                    var $output =
                        '<img src="/storage/' + $image + '" alt="Avatar" height="32" width="32">';
                } else {
                    // For Avatar badge
                    var $name = full['name'],
                        $initials = $name.match(/\b\w/g) || [];
                    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                    $output = '<span class="avatar-content">' + $initials + '</span>';
                }
                var colorClass = $image === '' ? ' bg-light-danger ' : '';
                // Creates full output for row
                var $row_output =
                '<div class="d-flex justify-content-left align-items-center">' +
                '<div class="avatar-wrapper">' +
                '<div class="avatar ' +
                colorClass +
                ' me-1">' +
                $output +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-column">' +
                '<a href="javascript:;" class="user_name text-truncate text-body"><span class="fw-bolder">' +
                $name +
                '</span></a>' +
                '<small class="emp_post text-muted">' +
                $email +
                '</small>' +
                '</div>' +
                '</div>';
                return $row_output;}
            },
            { targets: 2 },
            { targets: 3 },
            { targets: 4, render: (data, type, full, meta) => {return '$' + data} },
            { targets: 5 },
            {
                // Label
                targets: -2,
                orderable: false,
                render: function (data, type, full, meta) {
                    var $status_number = full['status'];
                    var $status = {
                        1: { title: 'Started', class: 'badge-light-primary' },
                        2: { title: 'Pending', class: ' badge-light-warning' },
                        3: { title: 'Cancelled', class: ' badge-light-danger' },
                        4: { title: 'Paid', class: ' badge-light-success' },
                    };
                    if (typeof $status[$status_number] === 'undefined') {
                        return data;
                    }
                    return (
                        '<span class="badge rounded-pill ' + $status[$status_number].class +
                        '">' + $status[$status_number].title + '</span>'
                    );
                }
            },
            {
                // Actions
                targets: -1,
                className: 'text-center',
                orderable: false,
                render: (data, type, full, meta) => {
                    return (
                        '<a href="#previewInvoice" data-bs-toggle="modal" class="item-edit text-dark" onclick="getData(' + full['id'] + ')">' +
                            feather.icons['eye'].toSvg({ class: 'font-medium-3' }) +
                        '</a>'
                    );
                }
            }
            ],
            order: [[2, 'desc']],
            dom: 't<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 5,
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, 'All']],
            buttons: [],
            language: {
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;'
            }
            }
        });
    }
});

/**
 * Rides statue
 */

const getRidesStatus = () => {
    $.get('/dashboard/analytics/adminIndex').then(res => {
        const model = JSON.parse(res);
        $('.started-rides').text(model.start);
        $('.pending-rides').text(model.pending);
        $('.cancelled-rides').text(model.cancel);
        $('.completed-rides').text(model.paid);
        $('.users-count').text(model.users);
        $('.seats-count').text(model.seats);
    });
}

$(document).ready(function() {
    getRidesStatus();
})
