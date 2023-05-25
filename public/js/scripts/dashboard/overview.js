/*=========================================================================================
    File Name: app-user-view-account.js
    Description: User View Account page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
let target_file = '';
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

    // Variable declaration for table
    var dt_project_table = $('.datatable-project'),
        invoice_carpool = $('.invoice-carpool'),
        icon_image = $('#icon-upload-img'),
        reset_icon = $('#icon-upload-img').attr('src'),
        form = $('#editProfile'),
        assetPath = $('body').attr('data-asset-path');

    // Project datatable
    // --------------------------------------------------------------------

    if (dt_project_table.length) {
      dt_project_table.DataTable({
        ajax: assetPath + 'data/table-datatable.json', // JSON file to add data
        ordering: false,
        columns: [
          // columns according to JSON
          { data: 'full_name' },
          { data: 'salary' },
          { data: 'status' },
          { data: 'start_date' },
          { data: '' },
        ],
        columnDefs: [
          {
            targets: 0,
            render: function (data, type, full, meta) {
              var $name = full['full_name'],
                $email = full['email'],
                $image = full['avatar'];
              if ($image) {
                // For Avatar image
                var $output =
                  '<img src="/storage/' +
                  $image +
                  '" alt="User Image" width="32" class="rounded-circle">';
              } else {
                // For Avatar badge
                var stateNum = Math.floor(Math.random() * 6) + 1;
                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                var $state = states[stateNum],
                  $name = full['full_name'],
                  $initials = $name.match(/\b\w/g) || [];
                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
              }
              // Creates full output for row
              var $row_output =
                '<div class="d-flex justify-content-left align-items-center">' +
                '<div class="avatar-wrapper">' +
                '<div class="avatar me-1">' +
                $output +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-column">' +
                '<span class="text-truncate fw-bolder">' +
                $name +
                '</span>' +
                '<small class="text-muted">' +
                $email +
                '</small>' +
                '</div>' +
                '</div>';
              return $row_output;
            }
          },
          {
              // Label
              targets: -2,
              render: function (data, type, full, meta) {
                  var $status_number = full['status'];
                  var $status = {
                      1: { title: 'Current', class: 'badge-light-primary' },
                      2: { title: 'Professional', class: ' badge-light-success' },
                      3: { title: 'Rejected', class: ' badge-light-danger' },
                      4: { title: 'Resigned', class: ' badge-light-warning' },
                      5: { title: 'Applied', class: ' badge-light-info' }
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
              targets: -1,
              render: function (data, type, full, meta) {
                  return (
                      '<div class="d-flex align-items-center col-actions">' +
                      '<a class="me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Mail">' +
                      feather.icons['send'].toSvg({ class: 'font-medium-2 text-body' }) +
                      '</a>' +
                      '<a class="me-1" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Invoice">' +
                      feather.icons['eye'].toSvg({ class: 'font-medium-2 text-body' }) +
                      '</a>' +
                      '<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Download">' +
                      feather.icons['download'].toSvg({ class: 'font-medium-2 text-body' }) +
                      '</a>'
                  );
              }
          }
        ],
        order: [[1, 'desc']],
        dom: 't',
        displayLength: 7,
        language: {
          sLengthMenu: 'Show _MENU_',
          // search: '',
          searchPlaceholder: 'Search Project'
        },
      });
    }


    // Invoice Carpool
    if (invoice_carpool.length) {
      invoice_carpool.DataTable({
        ajax: {url: '/apps/rides-carpool/index', dataSrc: ''},
        pageLength: 6,
        columns: [
          { data: 'id' },
          { data: '' },
          { data: 'amount' },
          { data: 'date_issue' },
          { data: '' }
        ],
        columnDefs: [
          {
              targets: 0,
              render: function (data, type, full, meta) {
                  var $rowOutput = '<a class="fw-bolder" href="#previewInvoice" data-bs-toggle="modal" onclick="getData(' + data + ')"> #' + data + '</a>';
                  return $rowOutput;
              }
          },
          {
              targets: 1,
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
                return $row_output;
              }
          },
          {
              targets: 2,
              render: function (data, type, full, meta) { return '$' + data }
          },
          {
              targets: 3,
              render: function (data, type, full, meta) {
                  var $rowOutput = moment(data).format('DD MMM YYYY');
                  return $rowOutput;
              }
          },
          {
              targets: -1,
              title: 'Actions',
              orderable: false,
              render: function (data, type, full, meta) {
                  return (
                      '<div class="d-flex align-items-center col-actions">' +
                      '<a class="me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Mail">' +
                      feather.icons['send'].toSvg({ class: 'font-medium-2 text-body' }) +
                      '</a>' +
                      '<a class="me-1" href="#previewInvoice" data-bs-toggle="modal" onclick="getData(' + full['id'] + ')">' +
                      feather.icons['eye'].toSvg({ class: 'font-medium-2 text-body' }) +
                      '</a>' +
                      '<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Download">' +
                      feather.icons['download'].toSvg({ class: 'font-medium-2 text-body' }) +
                      '</a>'
                  );
              }
          }
        ],
        order: [[1, 'desc']],
        dom: '<"card-header pt-1 pb-25"<"head-label-carpool"><"dt-action-buttons text-end"B>>t',
        buttons: [
              {
                  extend: 'collection',
                  className: 'btn btn-outline-primary dropdown-toggle',
                  text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                  buttons: [
                      {
                          extend: 'pdf',
                          text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                          className: 'dropdown-item',
                          exportOptions: { columns: [1, 3, 4] }
                      },
                      {
                          extend: 'excel',
                          text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                          className: 'dropdown-item',
                          exportOptions: { columns: [1, 3, 4] }
                      },
                      {
                          extend: 'csv',
                          text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                          className: 'dropdown-item',
                          exportOptions: { columns: [1, 3, 4] }
                      },
                  ],
                  init: function (api, node, config) {
                      $(node).removeClass('btn-secondary');
                      $(node).parent().removeClass('btn-group');
                      setTimeout(function () {
                          $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                      }, 50);
                  }
              }
        ],
        initComplete: function () {
          $(document).find('[data-bs-toggle="tooltip"]').tooltip();
        },
        drawCallback: function () {
          $(document).find('[data-bs-toggle="tooltip"]').tooltip();
        }
      });
      $('div.head-label-carpool').html('<h4 class="card-title">Invoices Carpool</h4>');
    }

    $("#icon").change(e => {
        target_file = e.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = function () {
            icon_image.attr('src', reader.result);
        }
    });

    $('#icon-reset').click(e => {
        icon_image.attr('src', reset_icon);
        target_file = '';
    });

    form.validate({
        rules: {
            'icon': {required: true},
            'firstname': {required: true},
            'lastname': {required: true},
            'email': {required: true},
            'company-email': {required: true},
            'mobile': {required: true},
            'gender': {required: true},
            'country': {required: true}
        }
    });

    form.on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('id', $('#user_id').val());
        target_file && formData.append('icon', target_file);
        formData.append('firstname', $('#firstname').val());
        formData.append('lastname', $('#lastname').val());
        formData.append('email', $('#email').val());
        formData.append('company_email', $('#company-email').val());
        formData.append('mobile', $('#mobile').val());
        formData.append('gender', $('#gender').val());
        formData.append('country', $('#country').val());
        $.ajax({
            type: 'POST',
            url: '/dashboard/user/save',
            data: formData,
            contentType: false,
            processData: false,
            success: data => {
                if(data.id > 0) {
                    $('#firstname').val(data.firstname);
                    $('#lastname').val(data.lastname);
                    $('#email').val(data.email);
                    $('#company-email').val(data.company_email);
                    $('#mobile').val(data.phonenumber);
                    $("#gender").val(data.gender);
                    $('#country').val(data.country);
                    $('#card-email').text(data.email);
                    $('#card-photo').attr('src', assetPath + data.photo);
                    $('#card-phonenumber').text(data.phonenumber);
                    $('#card-title-name').text(data.firstname + ' ' + data.lastname);
                    $('#card-name').text(data.firstname + ' ' + data.lastname)
                    $("#card-company-email").text(data.company_email);
                    toastr['success']('Category item has been saved successfully.', 'Success!', {
                        closeButton: true, tapToDismiss: false
                    });
                } else {
                    toastr['error']('Failed to save.', 'Failed!', {
                        closeButton: true, tapToDismiss: false
                    });
                }
                $('.modal').modal('hide');
            }
        })
    })
  });
