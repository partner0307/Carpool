/**
 * DataTables Basic
 */

let target_id = '';
const getModel = id => {
    target_id = id ? id : null;
    $.get(`/settings/notification-settings/edit/${id}`).then(res => {
        $('#provider').val(res.provider);
        $('#status').attr('checked', res.status === 1 ? true : false);
    });
}

 $(function () {
    'use strict';

    var dt_basic_table = $('.email-provider'),
        form = $('#editProvider');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/settings/notification-settings/index', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'provider' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1 },
          {
            targets: -2,
            orderable: false,
            render: function (data, type, full, meta) {
              let $status = full['status'];
              return (
                `<div class="form-check form-switch form-check-primary">` +
                  `<input type="checkbox" class="form-check-input btn_status" id="status_${full['id']}" ${$status == 1 && 'checked'} />` +
                  `<label class="form-check-label" for="status_${full['id']}">` +
                    `<span class="switch-icon-left">${feather.icons['check'].toSvg({ class: 'font-small-4' })}</span>` +
                    `<span class="switch-icon-right">${feather.icons['x'].toSvg({ class: 'font-small-4' })}</span>` +
                  `</label>` +
                `</div>`
              );
            }
          },
          {
            targets: -1,
            className: 'text-center',
            title: 'Actions',
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<div class="d-flex justify-content-around">' +
                '<a href="#email-provider-modal" data-bs-toggle="modal" class="item-edit text-dark" onclick="getModel(' + full['id'] + ')">' +
                    feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                '</a>' +
                '</div>'
              );
            }
          }
        ],
        order: [[2, 'desc']],
        dom: '<"card-header border-bottom p-1"<"email-provider-header"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
      $('div.email-provider-header').html('<h5 class="mb-0">Provider List</h5>');
    }

    form.validate({ rules: { 'provider': {required: true} } });

    form.on('submit', e => {
        e.preventDefault();
        const model = {
            id: target_id,
            provider: $('#provider').val(),
            status: $('#status').is(':checked') ? 1 : -1
        };

        $.post('/settings/notification-settings/save', model).then(data => {
            if(data > 0) {
                dt_basic.ajax.reload();
                toastr['success']('Email provider has been saved successfully.', 'Success!', {
                    closeButton: true, tapToDismiss: false
                });
            } else {
                toastr['error']('Failed to save.', 'Failed!', {
                    closeButton: true, tapToDismiss: false
                });
            }
            $('.modal').modal('hide');
        });
    });

    $('.datatables-basic tbody').on('click', '.btn-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/settings/notification-settings/change/${id}`).then(res => {
            if(res != 1) {
                $('.btn-status').prop('checked', false);
            }
        })
    });
  });
