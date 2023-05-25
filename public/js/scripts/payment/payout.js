/**
 * DataTables Basic
 */

 let dt_basic = '', target_id = '', target_photo = '', target_name = '', target_company = '', target_bank = '';
 const setId = (id, photo, name, company, bank) => {
    console.log('hello');
     target_id = id ? id : null;
     target_photo = photo, target_name = name, target_company = company, target_bank = bank;
     $.get(`/payment/payoutEdit/${id}`).then(res => {
         $('#amount').val(res.amount);
         $('#charge').val(res.charge);
         $('#payout-status').attr('checked', res.status === 1 ? true : false);
     });
 }

 const handleChange = () => {
     const status = $("#user-role").val();
     const checkedArr = [];
     $(".dt-checkboxes").each((i, e) => {
         $(e).is(':checked') && checkedArr.push($(e).val());
     });
     const model = {ids: checkedArr, status: status};
     $.post(`/payment/payoutChangeMany`, model).then(data => {
         if(data == 1) {
             dt_basic.ajax.reload();
         }
     });
 }

  $(function () {
     'use strict';

     var dt_basic_table = $('.datatables-basic'),
         form = $('#editPayout');

     // DataTable with buttons
     // --------------------------------------------------------------------

     if (dt_basic_table.length) {
         dt_basic = dt_basic_table.DataTable({
             ajax: {url: '/payment/payoutIndex', dataSrc: ''},
             columns: [
                 { data: 'id' },
                 { data: '' },
                 { data: 'amount' },
                 { data: 'charge' },
                 { data: 'bank' },
                 { data: 'status' },
                 { data: '' }
             ],
             columnDefs: [
                 {targets: 0,
                    orderable: false,
                    checkboxes: {
                    selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /></div>'
                    },
                    render: function (data, type, full, meta) {
                    return (
                        '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="' + data + '" id="checkbox' + data +
                        '" /><label class="form-check-label" for="checkbox' + data +
                        '"></label></div>'
                    );
                 }},
                 {targets: 1,
                 render: function (data, type, full, meta) {
                     var $user_img = full['photo'],
                     $name = full['name'],
                     $company = full['company'];
                     if ($user_img) {
                         var $output = `<img src="/storage/${$user_img}" alt="Avatar" width="32" height="32">`;
                     } else {
                         var stateNum = full['status'];
                         var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                         var $state = states[stateNum],
                             $name = full['name'],
                             $initials = $name.match(/\b\w/g) || [];
                         $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                         $output = '<span class="avatar-content">' + $initials + '</span>';
                     }
                     var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                     var $row_output =
                         '<div class="d-flex justify-content-left align-items-center">' +
                         '<div class="avatar ' + colorClass + ' me-1">' + $output +
                         '</div><div class="d-flex flex-column">' +
                         '<span class="emp_name text-truncate fw-bold">' + $name +
                         '</span><small class="emp_post text-truncate text-muted">' + $company +
                         '</small></div></div>';
                     return $row_output;
                 }},
                 { targets: 2, render: (data, type, full, meta) => {return '$' + data} },
                 { targets: 3, render: (data, type, full, meta) => {return '$' + data} },
                 { targets: 4 },
                 {targets: -2,
                 render: function (data, type, full, meta) {
                     var $status_number = full['status'];
                     var $status = {
                         1: { title: 'Pending', class: ' badge-light-warning' },
                         2: { title: 'Paid', class: ' badge-light-success' },
                     };
                     if (typeof $status[$status_number] === 'undefined') {
                         return data;
                     }
                     return (
                         '<span class="badge rounded-pill ' + $status[$status_number].class +
                         '">' + $status[$status_number].title + '</span>'
                     );
                 }},
                {targets: -1,
                className: 'text-center',
                orderable: false,
                render: (data, type, full, meta) => {
                    return (
                        '<div class="d-flex justify-content-around">' +
                            '<a href="#payout" data-bs-toggle="modal" class="item-edit text-dark" onclick="setId(' + full['id'] + ', ' + full['photo'] + ', ' + full['name'] + ', ' + full['company'] + ', ' + full['bank'] + '">' +
                                feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                            '</a>' +
                        '</div>'
                    );
                }}
            ],
            order: [[2, 'desc']],
            dom: '<"card-header border-bottom p-1"' +
            '<"head-label">' +
            '<"d-flex justify-content-between"' +
            '<"dt-action-buttons text-end"B><"head-search">>' +
            '>' +
            '<"d-flex justify-content-between align-items-center mx-1 row"' +
            '<"col-sm-12 col-md-6"l>' +
            '<"col-sm-12 col-md-6"' +
            '<"col-12 row pe-3"' +
            '<"col-md-12 col-lg-6"<"status-change pt-1 me-1">>' +
            '<"col-md-12 col-lg-6"f>>>' +
            '>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
                }
            ],
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            initComplete: function () {
                this.api().columns(1).every(function() {
                    const select = $('<select id="user-role" class="form-select" onchange="handleChange()"><option value=""> change status </option></select>'
                    ).appendTo('.status-change').on('change',function() {});
                    select.append('<option value="1">Pending</option><option value="2">Paid</option>');
                });

                this.api().columns(5).every(function() {
                    const column = this;
                    const search = $('<select class="form-select pe-3 border-0" placeholder="Filter status">' + '<option value="">Filter status</option>' + '</select>').appendTo('.head-search').on('change', function() {
                        const val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^'+val+'$' : '', true, false).draw();
                    });
                    search.append('<option value="pending">Pending</option><option value="paid">Paid</option>');
                })
            }
        });

        $('div.head-label').html('<h5 class="mb-0">User List Payout</h5>');
    }

    form.validate({
        rules: {
            'amount': {required: true},
            'charge': {required: true}
        }
    })

    form.on('submit', e => {
        e.preventDefault();
        const model = {
            id: target_id,
            amount: $('#amount').val(),
            charge: $('#charge').val(),
            status: $('#status').is(':checked') ? 1 : -1
        }
        $.post('/payment/payout/save', model).then(data => {
            if(data > 0) {
                if(target_id) {
                    dt_basic.ajax.reload();
                } else {
                    dt_basic.row.add({
                        id: data,
                        photo: target_photo,
                        name: target_name,
                        company: target_company,
                        amount: $('#amount').val(),
                        charge: $('#charge').val(),
                        bank: target_bank,
                        status: $('#status').is(':checked') ? 1 : -1
                    }).draw();
                }
                toastr['success']('Payout info has been saved successfully.', 'Success!', {
                    closeButton: true, tapToDismiss: false
                });
            } else {
                toastr['error']('Save failed', 'Failed!', {
                    closeButton: true, tapToDismiss: false
                });
            }
        })
    });
});
