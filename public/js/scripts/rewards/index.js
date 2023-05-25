/**
 * DataTables Basic
 */

let target_id = '';
const setId = id => {
    target_id = id ? id : '';
    $.get(`/rewards/edit/${id}`).then(res => {
        $('#icon-upload-img').attr('src', '/storage/' + res.icon);
        $('#title').val(res.title);
        $('#description').val(res.description);
        $("#points").val(res.points);
        $('#amount').val(res.amount);
    });
}

 $(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        icon_image = $('#icon-upload-img'),
        reset_icon = $('#icon-upload-img').attr('src'),
        form = $('#editCoupon'),
        target_file_icon = '', target_file_coupon = '';

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/rewards/view', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'icon' },
          { data: 'title' },
          { data: 'points' },
          { data: 'amount' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1, render: (data, type, full, meta) => {
                return '<div class="d-flex justify-content-center align-items-center">' +
                '<div class="avatar-wrapper">' +
                    '<div class="avatar bg-light-success me-1">' +
                        '<img src="/storage/' + data + '" alt="' + full['title'] + '" width="32" height="32" />' +
                    '</div>' +
                '</div>' +
              '</div>';
          } },
          { targets: 2 },
          { targets: 3 },
          { targets: 4 },
          {
            // Label
            targets: -2,
            orderable: false,
            render: function (data, type, full, meta) {
                var $status = full['status'];
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
                '<a href="#rewards" class="item-edit text-dark" data-bs-toggle="modal" onclick="setId(' + full['id'] + ')">' +
                    feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                '</a>'
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
                text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add Reward',
                className: 'newRewards create-new btn btn-primary mx-2',
                attr: {
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#rewards'
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
      $('div.head-label').html('<h5 class="mb-0">Reward</h5>');
    }

    $('.newRewards').click(e => {setId()});

    $("#icon").change(e => {
        target_file_icon = e.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = function () {
            icon_image.attr('src', reader.result);
        }
    });

    $('#coupon').change(e => {
        target_file_coupon = e.target.files[0];
    })

    $('#icon-reset').click(e => {
        icon_image.attr('src', reset_icon);
        target_file_icon = '';
    });

    form.validate({
        rules: {
            'icon': {required: true},
            'title': {required: true},
            'description': {required: true},
            'points': {required: true},
            'amount': {required: true}
        }
    });

    form.on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        target_id && formData.append('id', target_id);
        target_file_icon && formData.append('icon', target_file_icon);
        target_file_coupon && formData.append('coupon', target_file_coupon);
        formData.append('title', $('#title').val());
        formData.append('description', $('#description').val());
        formData.append('points', $('#points').val());
        formData.append('amount', $('#amount').val());
        formData.append('status', $('#status').is(':checked') ? 1 : -1);
        $.ajax({
            type: 'POST',
            url: '/rewards/save',
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
                            icon: model.icon,
                            title: $('#title').val(),
                            points: $('#points').val(),
                            amount: $('#amount').val(),
                            status: $('#status').is(':checked') ? 1 : -1
                        }).draw();
                    }
                    toastr['success']('Rewards item has been saved successfully.', 'Success!', {
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
});
