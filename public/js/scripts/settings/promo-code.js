/**
 * DataTables Basic
 */

let target_id = '';
const setId = id => {
    target_id = id ? id : null;
    $.get(`/settings/promo/edit/${id}`).then(res => {
        $('#promocode').val(res.promo_code);
        $('#usage-limit').val(res.usage_limit_user);
        $('#description').val(res.description);
        $('#order-amount').val(res.min_order_amount);
        $('#discount-amount').val(res.max_discount_amount);
        $('#discount').val(res.discount);
        $('#expiry').val(res.expire_date);
        $('#discount-type').val(res.discount_type);
        $('#usertype').val(res.usertype);
        $('#status').attr('checked', res.status === 1 ? true : false);
    })
}

 $(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        form = $('#editPromocode');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/settings/promo/index', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'promo_code' },
          { data: 'discount_type' },
          { data: 'discount' },
          { data: 'usage_limit_user' },
          { data: 'usertype' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1 },
          { targets: 2 },
          { targets: 3 },
          { targets: 4 },
          {
            targets: -2,
            orderable: false,
            render: function (data, type, full, meta) {
              let $status = full['status'];
              return (
                `<div class="form-check form-switch form-check-primary">` +
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
            targets: -1,
            className: 'text-center',
            title: 'Actions',
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<div class="d-flex justify-content-around">' +
                '<a href="#promo-code" data-bs-toggle="modal" class="item-edit text-dark" onclick="setId(' + full['id'] + ')">' +
                    feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                '</a>' +
                '<a href="javascript:;" class="item-remove text-dark delete-record" id="' + full['id'] + '">' +
                    feather.icons['trash'].toSvg({ class: 'font-medium-3' }) +
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
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add Code',
            className: 'create-new btn btn-primary mx-2',
            attr: {
              'data-bs-toggle': 'modal',
              'data-bs-target': '#promo-code'
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
      $('div.head-label').html('<h5 class="mb-0">Promocode List</h5>');
    }

    $('.create-new').click(e => {setId()});

    form.validate({
        rules: {
            'promocode': {required: true},
            'usage-limit': {required: true},
            'description': {required: true},
            'order-amount': {required: true},
            'discount-amount': {required: true},
            'discount': {required: true},
            'expiry': {required: true},
            'discount-type': {required: true},
            'usertype': {required: true},
        }
    })

    form.on('submit', e => {
        e.preventDefault();
        const model = {
            id: target_id ? target_id : null,
            promocode: $('#promocode').val(),
            usage: $('#usage-limit').val(),
            description: $('#description').val(),
            order_amount: $('#order-amount').val(),
            discount_amount: $('#discount-amount').val(),
            discount: $('#discount').val(),
            expiry: $('#expiry').val(),
            discount_type: $('#discount-type').val(),
            usertype: $('#usertype').val(),
            status: $('#status').is(':checked') ? 1 : -1
        }
        model.promocode && $.post('/settings/promo/save', model, data => {
            if(data > 0) {
                if(target_id) {
                    dt_basic.ajax.reload();
                } else {
                    dt_basic.row.add({
                        id: data,
                        promo_code: model.promocode,
                        discount_type: model.discount_type,
                        discount: model.discount,
                        min_order_amount: model.min_order_amount,
                        max_discount_amount: model.max_discount_amount,
                        expire_date: model.expiry,
                        usage_limit_user: model.usage,
                        description: model.description,
                        usertype: model.usertype,
                        status: model.status
                    }).draw();
                }
                toastr['success']('Your promo code has been saved successfully.', 'Success!', {
                    closeButton: true, tapToDismiss: false
                });
            } else {
                toastr['error']('Failed to save.', 'Failed!', {
                    closeButton: true, tapToDismiss: false
                });
            }
            $('.modal').modal('hide');
        });
    })

    // Delete Record
    $('.datatables-basic tbody').on('click', '.delete-record', async function () {
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
                $.get(`/settings/promo/remove/${target}`, res => {
                    if(res == 1) {
                        toastr['success']('Your promo code has been removed successfully.', 'Success!', {
                            closeButton: true, tapToDismiss: false
                        });
                        dt_basic.ajax.reload();
                    }
                })
            }
        });
    });

    $('.datatables-basic tbody').on('click', '.btn-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/settings/promo/change/${id}`).then(res => {
            if(res != 1) {
                $('.btn-status').prop('checked', false);
            }
        })
    });
});
