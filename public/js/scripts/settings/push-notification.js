/**
 * DataTables Basic
 */

 $(function () {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        form = $('#editNotification');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        ajax: {url: '/settings/push-notification/index', dataSrc: ''},
        columns: [
          { data: 'id' },
          { data: 'type' },
          { data: 'title' },
          { data: 'message' },
          { data: '' },
          { data: '' }
        ],
        columnDefs: [
          { targets: 0 },
          { targets: 1, render: (data, type, full, meta) => {return data === 0 ? 'All' : 'User'} },
          { targets: 2 },
          { targets: 3 },
          { targets: -2, render: (data, type, full, meta) => {return full['depart_time'].split(' ')[0]} },
          { targets: -1, render: (data, type, full, meta) => {return full['depart_time'].split(' ')[1]} }
        ],
        order: [[2, 'desc']],
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
      $('div.head-label').html('<h5 class="mb-0">Push List</h5>');
    }

    form.validate({
        rules: {
            'type': {required: true},
            'title': {required: true},
            'message': {required: true}
        }
    });

    form.on('submit', e => {
        e.preventDefault();
        const model = {
            type: $('#type').val(),
            title: $('#title').val(),
            message: $('#message').val()
        };
        model.title && $.post('/settings/push-notification/save', model, data => {
            const res = JSON.parse(data);
            if(res.id > 0) {
                dt_basic.row.add({
                    'id': res.id,
                    'title': $('#title').val(),
                    'message': $('#message').val(),
                    'type': $('#type').val(),
                    'depart_time': res.depart_time
                }).draw();
                toastr['success']('Business item has been saved successfully.', 'Success!', {
                    closeButton: true, tapToDismiss: false
                });
                $('#title').val('');
                $('#message').val('');
                $('#type').val('');
            } else {
                toastr['error']('Failed to save.', 'Failed!', {
                    closeButton: true, tapToDismiss: false
                });
            }
        })
    })
  });
