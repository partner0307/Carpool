/**
 * DataTables Basic
 */

let country_target_id = '';
const countrySetId = id => {
    country_target_id = id ? id : null;
    $.get(`/settings/general/country/edit/${id}`).then(res => {
        $('#country-name').val(res.country);
        $('#code').val(res.code);
        $('#rate-to-usd').val(res.rate_to_usd);
        $('#country-status').attr('checked', res.status === 1 ? true : false);
    });
}

 $(function () {
    'use strict';

    var country_table = $('.country-currency'),
        form = $('#editCountry');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (country_table.length) {
      var country_basic = country_table.DataTable({
        ajax: {url: '/settings/general/country/index', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'country' },
          { data: 'code' },
          { data: 'rate_to_usd' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1 },
          { targets: 2, render: (data, type, full, meta) => {return `<span class='badge rounded-pill badge-light-primary'>${data}</span>`} },
          { targets: 3 },
          {
            // Label
            targets: -2,
            orderable: false,
            render: function (data, type, full, meta) {
              let $status = full['status'];
              return (
                `<div class="form-check form-switch form-check-primary text-center">` +
                  `<input type="checkbox" class="form-check-input country-status" id="status_${full['id']}" ${$status == 1 && 'checked'} />` +
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
                '<div class="d-flex justify-content-around">' +
                '<a href="#country-currency-modal" data-bs-toggle="modal" class="item-edit text-dark" onclick="countrySetId(' + full['id'] + ')">' +
                    feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                '</a>' +
                '<a href="javascript:;" class="item-remove text-dark country-delete-record" id="' + full['id'] + '">' +
                    feather.icons['trash'].toSvg({ class: 'font-medium-3' }) +
                '</a>' +
                '</div>'
              );
            }
          }
        ],
        order: [[2, 'desc']],
        dom: '<"card-header border-bottom p-1"<"country-currency-header"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 5,
        lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, 'All']],
        buttons: [
          {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add Currency',
            className: 'country-new btn btn-primary mx-2',
            attr: {
              'data-bs-toggle': 'modal',
              'data-bs-target': '#country-currency-modal'
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
      $('div.country-currency-header').html('<h5 class="mb-0">Country & Currency</h5>');
    }

    $('.country-new').click(e => {countrySetId()});

    form.validate({
        rules: {
            'country-name': {required: true},
            'code': {required: true},
            'rate-to-usd': {required: true}
        }
    });

    form.on('submit', e => {
        e.preventDefault();
        const model = {
            id: country_target_id,
            country: $('#country-name').val(),
            code: $('#code').val(),
            rate_to_usd: $('#rate-to-usd').val(),
            status: $('#country-status').is(':checked') ? 1 : -1
        }
        $.post('/settings/general/country/save', model).then(data => {
            if(data > 0) {
                if(country_target_id) {
                    country_basic.ajax.reload();
                } else {
                    country_basic.row.add({
                        id: data,
                        country: $('#country-name').val(),
                        code: $('#code').val(),
                        rate_to_usd: $('#rate-to-usd').val(),
                        status: $('#country-status').is(':checked') ? 1 : -1
                    }).draw();
                }
                toastr['success']('Country and currency have been saved successfully.', 'Success!', {
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

    $('.country-currency tbody').on('click', '.country-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/settings/general/country/change/${id}`).then(res => {
            if(res != 1) {
                $('.country-status').prop('checked', false);
            }
        })
    });

    $('.country-currency tbody').on('click', '.country-delete-record', async function () {
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
                $.get(`/settings/general/country/remove/${target}`, res => {
                    if(res == 1) {
                        toastr['success']('Country and currency have been removed successfully.', 'Success!', {
                            closeButton: true, tapToDismiss: false
                        });
                        country_basic.ajax.reload();
                    }
                })
            }
        });
    });

  });
