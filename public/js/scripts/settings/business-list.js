/**
 * DataTables Basic
 */

 let target_id = '';
 const setId = id => {
    target_id = id ? id : null;
    $.get(`/settings/business/edit/${id}`).then(res => {
        $('#name').val(res.name);
        $('#email').val(res.email);
        $('#icon-upload-img').attr('src', '/storage/' + (id ? res.logo : 'images/temp/sample.png'));
        $('#address').val(res.address);
        $('#status').attr('checked', res.status === 1 ? true : false);
    });
 };

 $(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        form = $('#editBusiness'),
        icon_image = $('#icon-upload-img'),
        reset_icon = $('#icon-upload-img').attr('src'),
        target_file = '';

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/settings/business/index', dataSrc: ''},
        columns: [
          { data: '' },
          { data: 'name' },
          { data: 'email' },
          { data: 'address' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0, render: (data, type, full, meta) => {
            const logo = full['logo'];
              return logo && `<img src='/storage/${logo}' alt='' width='30px' height='30px' />`;
          }},
          { targets: 1 },
          { targets: 2 },
          { targets: 3 },
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
                '<a href="#business-list" data-bs-toggle="modal" class="item-edit text-dark" onclick="setId(' + full['id'] + ')">' +
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
                extend: 'pdf',
                text: 'PDF',
                className: 'create-new btn btn-outline-primary me-2',
                exportOptions: { columns: [0, 1, 2, 3] },
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            },
            {
                extend: 'excel',
                text: 'EXCEL',
                className: 'create-new btn btn-outline-primary me-2',
                exportOptions: { columns: [0, 1, 2, 3] },
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            },
            {
                extend: 'csv',
                text: 'CSV',
                className: 'create-new btn btn-outline-primary me-2',
                exportOptions: { columns: [0, 1, 2, 3] },
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            },
            {
                text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add Code',
                className: 'create-new btn-add-new btn btn-primary mx-2',
                attr: {
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#business-list'
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
      $('div.head-label').html('<h5 class="mb-0">Businesscode List</h5>');
    }

    $('.btn-add-new').click(e => {setId()});

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
            'name': {required: true},
            'email': {required: true},
            'address': {required: true}
        }
    });

    form.on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        target_id && formData.append('id', target_id);
        target_file && formData.append('icon', target_file);
        formData.append('name', $('#name').val());
        formData.append('email', $('#email').val());
        formData.append('address', $('#address').val());
        formData.append('status', $('#status').is(':checked') ? 1 : -1);
        $('#name').val() && $.ajax({
            type: 'POST',
            url: '/settings/business/save',
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
                            name: $('#name').val(),
                            email: $('#email').val(),
                            address: $('#address').val(),
                            logo: model.logo,
                            status: $('#status').is(':checked') ? 1 : -1
                        }).draw();
                    }
                    toastr['success']('Business Item has been saved successfully.', 'Success!', {
                        closeButton: true, tapToDismiss: false
                    });
                } else {
                    toastr['error']('Save failed', 'Failed!', {
                        closeButton: true, tapToDismiss: false
                    });
                }
                $('.modal').modal('hide');
            }
        });
    });

    $('.datatables-basic tbody').on('click', '.btn-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/settings/business/change/${id}`).then(res => {
            if(res != 1) {
                $('.btn-status').prop('checked', false);
            }
        })
    });

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
                $.get(`/settings/business/remove/${target}`, res => {
                    if(res == 1) {
                        toastr['success']('Business Item has been removed successfully.', 'Success!', {
                            closeButton: true, tapToDismiss: false
                        });
                        dt_basic.ajax.reload();
                    }
                })
            }
        });
    });
});
