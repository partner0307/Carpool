/**
 * DataTables Basic
 */

let bank_target_id = '';
const setId = id => {
    bank_target_id = id ? id : null;
    $.get(`/settings/general/bank/edit/${id}`).then(res => {
        $('#bank-name').val(res.name);
        $('#bank-country').val(res.country);
        $('#bank-status').attr('checked', res.status === 1 ? true : false);
    });
}

 $(function () {
    'use strict';

    var bank_table = $('.bank-supported'),
        form = $('#editBank');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (bank_table.length) {
      var bank_basic = bank_table.DataTable({
        ajax: {url: '/settings/general/bank/index', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'name' },
          { data: 'country' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1 },
          { targets: 2, render: (data, type, full, meta) => {
            const countries = {1: 'Panama', 2: 'United States'};
            return countries[data];
          } },
          {
            // Label
            targets: -2,
            orderable: false,
            render: function (data, type, full, meta) {
              let $status = full['status'];
              return (
                `<div class="form-check form-switch form-check-primary text-center">` +
                  `<input type="checkbox" class="form-check-input bank-status" id="bankstatus_${full['id']}" ${$status == 1 && 'checked'} />` +
                  `<label class="form-check-label" for="bankstatus_${full['id']}">` +
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
                '<div class="d-flex justify-content-around">' +
                '<a href="#bank-modal" data-bs-toggle="modal" class="item-edit text-dark" onclick="setId(' + full['id'] + ')">' +
                    feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                '</a>' +
                '<a href="javascript:;" class="item-remove text-dark bank-delete-record" id="' + full['id'] + '">' +
                    feather.icons['trash'].toSvg({ class: 'font-medium-3' }) +
                '</a>' +
                '</div>'
              );
            }
          }
        ],
        order: [[2, 'desc']],
        dom: '<"card-header border-bottom p-1"<"business-supported-header"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 5,
        lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, 'All']],
        buttons: [
          {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add Bank',
            className: 'bank-new btn btn-primary mx-2',
            attr: {
              'data-bs-toggle': 'modal',
              'data-bs-target': '#bank-modal'
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
      $('div.business-supported-header').html('<h5 class="mb-0">Bank List</h5>');
    }

    $('.bank-new').click(e => {setId()});

    form.validate({
        rules: {
            'bank-name': {required: true},
            'bank-status': {required: true},
            'bank-country': {required: true}
        }
    });

    form.on('submit', e => {
        e.preventDefault();
        const model = {
            id: bank_target_id,
            name: $('#bank-name').val(),
            country: $('#bank-country').val(),
            status: $('#bank-status').is(':checked') ? 1 : -1
        }
        model.name && $.post('/settings/general/bank/save', model).then(data => {
            if(data > 0) {
                if(model.id) {
                    bank_basic.ajax.reload();
                } else {
                    bank_basic.row.add({
                        id: data,
                        name: $('#bank-name').val(),
                        country: $('#bank-country').val(),
                        status: $('#bank-status').is(':checked') ? 1 : -1
                    }).draw();
                }
                toastr['success']('Bank has been saved successfully.', 'Success!', {
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

    $('.bank-supported tbody').on('click', '.bank-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/settings/general/bank/change/${id}`).then(res => {
            if(res != 1) {
                $('.bank-status').prop('checked', false);
            }
        })
    });

    $('.bank-supported tbody').on('click', '.bank-delete-record', async function () {
        const target = $(this).attr('id');
        await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
              confirmButton: 'btn btn-primary',
              cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.get(`/settings/general/bank/remove/${target}`, res => {
                    if(res == 1) {
                        toastr['success']('Bank has been removed successfully.', 'Success!', {
                            closeButton: true, tapToDismiss: false
                        });
                        bank_basic.ajax.reload();
                    }
                })
            }
        });
    });
  });
