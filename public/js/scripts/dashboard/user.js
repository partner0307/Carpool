/**
 * DataTables Basic
 */

let target_id = '';

const setId = id => {
    target_id = id ? id : null;
    $.get(`/dashboard/user/edit/${id}`).then(res => {
        $('#firstname').val(res.firstname);
        $('#lastname').val(res.lastname);
        $('#gender').val(res.gender);
        $('#birthday').val(res.birthday);
        $('#email').val(res.email);
        $('#email-company').val(res.company_email);
        $('#mobile').val(res.phonenumber);
        $('#company').val(res.company);
        $('#country').val(res.country);
    });
}


 $(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        form = $('#editUser'),
        target_file = '', target_id = '',
        userView = '';

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/dashboard/user/index', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: '' },
          { data: 'email' },
          { data: 'phonenumber' },
          { data: 'wallet' },
          { data: '' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          {
            // For Checkboxes
            targets: 0,
            visible: false
          },
          {
            // Avatar image/badge, Name and post
            targets: 1,
            render: function (data, type, full, meta) {
                var $name = full['firstname'] + ' ' + full['lastname'],
                  $email = full['company'],
                  $image = full['photo'];
                  userView = 'dashboard/details/' + full['id'];
                if ($image) {
                  // For Avatar image
                  var $output =
                    `<img src="/storage/${$image}" alt="Avatar" height="32" width="32">`;
                } else {
                  // For Avatar badge
                  var stateNum = Math.floor(Math.random() * 6) + 1;
                  var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                  var $state = states[stateNum],
                    $name = full['firstname'] + ' ' + full['lastname'],
                    $initials = $name.match(/\b\w/g) || [];
                  $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                  $output = '<span class="avatar-content">' + $initials + '</span>';
                }
                var colorClass = $image === '' ? ' bg-light-' + $state + ' ' : '';
                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-left align-items-center">' +
                    '<div class="avatar-wrapper">' +
                        '<div class="avatar ' + colorClass + ' me-1">' + $output + '</div>' +
                    '</div>' +
                    '<div class="d-flex flex-column">' +
                        '<a href="' + userView + '" class="user_name text-truncate text-body">' +
                            '<span class="fw-bolder">' + $name + '</span>' +
                        '</a>' +
                        '<small class="emp_post text-muted">' + $email + '</small>' +
                    '</div>' +
                  '</div>';
                return $row_output;
              }
          },
          { targets: 3 },
          { targets: 4, width: 80 },
          { targets: 5, render: (data, type, full, meta) => {return 'Driver'}},
          {
            // Label
            targets: -2,
            render: function (data, type, full, meta) {
              let $status = full['status'];
              return (
                `<div class="form-check form-switch form-check-primary text-center">` +
                  `<input type="checkbox" class="form-check-input btn-status" id="status_${full['id']}" ${$status == 1 && 'checked'} />` +
                  `<label class="form-check-label" for="status_${full['id']}">` +
                    `<span class="switch-icon-left">${feather.icons['check'].toSvg({ class: 'font-small-4' })}</span>` +
                    `<span class="switch-icon-right">${feather.icons['x'].toSvg({ class: 'font-small-4' })}</span>` +
                  `</label>` +
                `</div>`
              );
            }
          },
          {
            // Actions
            targets: -1,
            className: 'text-center',
            title: 'Actions',
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<div class="d-flex justify-content-center">' +
                    '<a href="#user" data-bs-toggle="modal" class="item-edit text-dark" onclick="setId(' + full['id'] + ')">' +
                        feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                    '</a>' +
                '</div>'
              );
            }
          }
        ],
        order: [[2, 'desc']],
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 5,
        lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, 'All']],
        buttons: [
          {
            extend: 'pdf',
            text: 'PDF',
            className: 'create-new btn btn-outline-primary me-2',
            exportOptions: { columns: [3, 4, 5, 6, 7] },
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
            }
          },
          {
            extend: 'excel',
            text: 'EXCEL',
            className: 'create-new btn btn-outline-primary me-2',
            exportOptions: { columns: [3, 4, 5, 6, 7] },
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
            }
          },
          {
            extend: 'csv',
            text: 'CSV',
            className: 'create-new btn btn-outline-primary me-2',
            exportOptions: { columns: [3, 4, 5, 6, 7] },
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
            }
          },
          {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add User',
            className: 'create-new btn btn-primary mx-2',
            attr: {
              'data-bs-toggle': 'modal',
              'data-bs-target': '#user'
            },
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
            }
          }
        ],
        language: {
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        }
      });
      $('div.head-label').html('<h5 class="mb-0">User List</h5>');
    }

    $('.create-new').click(e => {setId()});

    $("#icon").change(e => {
        target_file = e.target.files[0];
    });

    form.validate({
        rules: {
            'firstname': {required: true},
            'lastname': {required: true},
            'gender': {required: true},
            'birthday': {required: true},
            'email': {required: true},
            'email-company': {required: true},
            'mobile': {required: true},
            'company': {required: true},
            'country': {required: true},
            'password': {required: true},
            'confirm': {required: true, equalTo: '#password'}
        }
    });

    form.on('submit', function(e) {
        e.preventDefault();
        let form = new FormData(this);
        target_id && form.append('id', target_id);
        target_file && form.append('icon', target_file);
        form.append('firstname', $('#firstname').val());
        form.append('gender', $('#gender').val());
        form.append('birthday', $('#birthday').val());
        form.append('lastname', $('#lastname').val());
        form.append('email', $('#email').val());
        form.append('company_email', $('#email-company').val());
        form.append('mobile', $('#mobile').val());
        form.append('company', $('#company').val());
        form.append('country', $('#country').val());
        form.append('password', $('#password').val());
        $('#email').val() && $.ajax({
            type: 'POST',
            url: '/dashboard/user/save',
            data: form,
            contentType: false,
            processData: false,
            success: data => {
                if(data.id > 0) {
                    dt_basic.row.add({
                        id: data.id,
                        name: $('#firstname').val() + ' ' + $('#lastname').val(),
                        email: $('#email').val(),
                        company: $('#company').text(),
                        phonenumber: $('#mobile').val(),
                        wallet: data.wallet,
                        photo: data.photo
                    }).draw();
                    toastr['success']('User has been saved successfully.', 'Success!', {
                        closeButton: true, tapToDismiss: false
                    });
                } else {
                    toastr['error']('Save failed', 'Failed!', {
                        closeButton: true, tapToDismiss: false
                    });
                }
            }
        });
    });
  });
