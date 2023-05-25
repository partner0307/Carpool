/**
 * DataTables Basic
 */

 let target_id = '';
 const setId = id => {
     target_id = id ? id : null;
     $.get(`/settings/document/edit/${id}`).then(res => {
         $('#name').val(res.name);
         $('#type').val(res.type);
         $('#status').attr('checked', res.status === 1 ? true : false);
     })
 }

 $(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        form = $('#editDocument');
    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/settings/document/index', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'name' },
          { data: 'type' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1 },
          { targets: 2, render: (data, type, full, meta) => {return data == 1 ? 'Driver' : 'Passenger'} },
          {
            // Label
            targets: -2,
            orderable: false,
            render: (data, type, full, meta) => {
              let $status = full['status'];
              return (
                `<div class="form-check form-switch form-check-primary">` +
                  `<input type="checkbox" class="form-check-input" id="status_${full['id']}" ${$status == 1 && 'checked'} />` +
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
                '<a href="#required-document" data-bs-toggle="modal" class="item-edit text-dark" onclick="setId(' + full['id'] + ')">' +
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
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add Document',
            className: 'create-new btn btn-primary mx-2',
            attr: {
              'data-bs-toggle': 'modal',
              'data-bs-target': '#required-document'
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
      $('div.head-label').html('<h5 class="mb-0">Car Category List</h5>');
    }

    $('.create-new').click(e => {setId()});

    form.validate({
        rules: {
            'name': {required: true},
            'type': {required: true},
        }
    })

    form.on('submit', e => {
        e.preventDefault();
        const model = {
            id: target_id ? target_id : null,
            name: $('#name').val(),
            type: $('#type').val(),
            status: $('#status').is(':checked') ? 1 : -1
        }
        model.name && $.post('/settings/document/save', model, data => {
            if(data > 0) {
                if(target_id) {
                    dt_basic.ajax.reload();
                } else {
                    dt_basic.row.add({
                        id: data,
                        name: model.name,
                        type: model.type,
                        status: model.status
                    }).draw();
                }
                toastr['success']('Your document has been saved successfully.', 'Success!', {
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

    $('.datatables-basic tbody').on('click', '.btn-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/settings/document/change/${id}`).then(res => {
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
                $.get(`/settings/document/remove/${target}`, res => {
                    if(res == 1) {
                        toastr['success']('Your document has been removed successfully.', 'Success!', {
                            closeButton: true, tapToDismiss: false
                        });
                        dt_basic.ajax.reload();
                    }
                })
            }
        });
    });
  });
