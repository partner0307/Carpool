/**
 * DataTables Basic
 */

let target_id = '';
const setId = id => {
    target_id = id ? id : null;
    $.get(`/payment/settingsEdit/${id}`).then(res => {
        $('#title').val(res.title);
        $('#type').val(res.type);
        $('#public_key').val(res.public_key);
        $('#private_key').val(res.private_key);
        $('#salt_key').val(res.salt_key);
        $('#merchantId').val(res.merchantId);
        $('#cclw').val(res.cclw);
        $('#api_key').val(res.api_key);
        $('#status').attr('checked', res.status === 1 ? true : false);
        $('#driver_plan').attr('checked', res.driver_plan === 1 ? true : false);
        $('#icon-upload-img').attr('src', '/storage/' + (id ? res.icon : 'images/temp/sample.png'));
    })
}

 $(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        form = $('#editSettings'),
        icon_image = $('#icon-upload-img'),
        reset_icon = $('#icon-upload-img').attr('src'),
        target_file = '';

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/payment/settingsIndex', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'title' },
          { data: '' },
          { data: 'type' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1 },
          { targets: 2, render: (data, type, full, meta) => {
              const icon = full['icon'];
              return icon && `<img src='/storage/${icon}' alt='' width='100%' height='40px' />`;
          } },
          { targets: 3, render: (data, type, full, meta) => {
            const list = {1: 'Paypal', 2: 'Cash'};
            return list[data];
          } },
          {
            // Label
            targets: -2,
            orderable: false,
            render: (data, type, full, meta) => {
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
            orderable: false,
            render: (data, type, full, meta) => {
              return (
                '<div class="d-flex justify-content-around">' +
                '<a href="#payment-settings" data-bs-toggle="modal" class="item-edit text-dark" onclick="setId(' + full['id'] + ')">' +
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
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add New',
            className: 'create-new btn btn-primary mx-2',
            attr: {
              'data-bs-toggle': 'modal',
              'data-bs-target': '#payment-settings'
            },
            init: (api, node, config) => {
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
      $('div.head-label').html('<h5 class="mb-0">Payment Settings</h5>');
    }

    $('.create-new').click(e => {setId()});

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
            'title': {required: true},
            'type': {required: true},
            'public_key': {required: true},
            'private_key': {required: true},
            'salt_key': {required: true},
            'merchantId': {required: true},
            'cclw': {required: true},
            'api_key': {required: true}
        }
    });

    form.on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        target_id && formData.append('id', target_id);
        target_file && formData.append('icon', target_file);
        formData.append('title', $('#title').val());
        formData.append('type', $('#type').val());
        formData.append('public_key', $('#public_key').val());
        formData.append('private_key', $('#private_key').val());
        formData.append('salt_key', $('#salt_key').val());
        formData.append('merchantId', $('#merchantId').val());
        formData.append('cclw', $('#cclw').val());
        formData.append('api_key', $('#api_key').val());
        formData.append('driver_plan', $('#driver_plan').is(':checked') ? 1 : -1);
        formData.append('status', $('#status').is(':checked') ? 1 : -1);
        $.ajax({
            type: 'POST',
            url: '/payment/settingsSave',
            data: formData,
            contentType: false,
            processData: false,
            success: data => {
                const model = JSON.parse(data);
                if(model.id > 0) {
                    if(target_id) {
                        dt_basic.ajax.reload();
                    } else {
                        dt_basic.row.add({
                            id: model.id,
                            title: $('#title').val(),
                            icon: model.icon,
                            type: $('#type').val(),
                            status: $('#status').is(':checked') ? 1 : -1
                        }).draw();
                    }
                    toastr['success']('Setting has been saved successfully.', 'Success!', {
                        closeButton: true, tapToDismiss: false
                    });
                } else {
                    toastr['error']('Failed to save.', 'Failed!', {
                        closeButton: true, tapToDismiss: false
                    });
                }
                $('.modal').modal('hide');
            }
        });
    });

    $('.datatables-basic tbody').on('click', '.btn-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/payment/settingsChange/${id}`).then(res => {
            if(res != 1) {
                $('.btn-status').prop('checked', false);
            }
        });
    });
  });
