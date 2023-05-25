/**
 * DataTables Basic
 */

 $(function () {
    'use strict';

    var dt_title_table = $('.faq-title'),
        dt_list_table = $('.faq-list'),
        titleForm = $('#editTitle'),
        messageForm = $('#editMessage'),
        dt_title = '', dt_list = '';

    let source = '';
    $.get('/settings/faqs/index').then(data => {
        source = data;
        generateTable();
        data.forEach(p => {$('#originTitle').append(`<option value='${p.id}'>${p.title}</option>`)});
    });

    // DataTable with buttons
    // --------------------------------------------------------------------
    const generateTable = () => {
        if (dt_title_table.length) {
            dt_title = dt_title_table.DataTable({
                data: source,
                columns: [
                    { data: 'id' },
                    { data: 'title' },
                    { data: 'date' },
                ],
                columnDefs: [
                    { targets: 0 },
                    { targets: 1 },
                    { targets: -1 }
                ],
                order: [[2, 'desc']],
                dom: '<"card-header border-bottom p-1"<"faq-title-header"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
            $('div.faq-title-header').html('<h5 class="mb-0">Title List</h5>');
        }

        // DataTable with buttons
        // --------------------------------------------------------------------

        if (dt_list_table.length) {
            dt_list = dt_list_table.DataTable({
                data: source.filter(p => p.message != null),
                columns: [
                    { data: 'id' },
                    { data: 'message' },
                    { data: 'date' },
                ],
                columnDefs: [
                    { targets: 0 },
                    { targets: 1 },
                    { targets: -1 }
                ],
                order: [[2, 'desc']],
                dom: '<"card-header border-bottom p-1"<"faq-list-header"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
            $('div.faq-list-header').html('<h5 class="mb-0">Faq List</h5>');
        }

        titleForm.validate({rules: {'title': {required: true}}});
        messageForm.validate({rules: {'originTitle': {required: true}, 'message': {required: true}}});

        titleForm.on('submit', e => {
            e.preventDefault();
            $.post('/settings/faqs/titleSave', {title: $('#title').val()}).then(data => {
                const model = JSON.parse(data);
                if(model.id > 0) {
                    dt_title.row.add({id: model.id, title: $('#title').val(), date: model.date}).draw();
                    $('#originTitle').append(`<option value='${model.id}'>${$('#title').val()}</option>`);
                    toastr['success']('Title has been saved successfully.', 'Success!', {
                        closeButton: true, tapToDismiss: false
                    });
                    $('#title').val('');
                } else {
                    toastr['error']('Failed to save.', 'Failed!', {
                        closeButton: true, tapToDismiss: false
                    });
                }
            })
        });

        messageForm.on('submit', e => {
            e.preventDefault();
            const model = {title: $('#originTitle').val(), message: $('#message').val()};
            $.post('/settings/faqs/messageSave', model).then(data => {
                const res = JSON.parse(data);
                if(res.id > 0) {
                    dt_list.row.add({id: res.id, message: $('#message').val(), date: res.date}).draw();
                    toastr['success']('Message has been saved successfully.', 'Success!', {
                        closeButton: true, tapToDismiss: false
                    });
                    $('#originTitle').val('');
                    $('#message').val('');
                } else {
                    toastr['error']('Failed to save.', 'Failed!', {
                        closeButton: true, tapToDismiss: false
                    });
                }
            })
        })
    }
  });
