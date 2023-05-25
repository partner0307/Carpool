let target_id, assetPath = $('body').attr('data-asset-path'), target_file = '';
const setId = id => {
    target_id = id ? id : null;
    id && $.get(`/account/system/edit/${id}`).then(res => {
        $('#firstname').val(res.firstname);
        $('#lastname').val(res.lastname);
        $('#email').val(res.email);
        $('#password').val(res.password);
        $('#company').val(res.company_id);
        $('#role').val(res.role_id);
        $('#status').attr('checked', res.status === 1 ? true : false);
    })
}

const setAdminInfo = model => {
    $('.admin-count').text(model.length);
    $('.admin-avatar-group').html(
        model.map((p, i) => {
            return (i < 4 && p.photo) && `<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title=${p.firstname + ' ' + p.lastname} class="avatar avatar-sm pull-up">
                <img class="rounded-circle" src="/storage/${p.photo}" alt="${i}" />
            </li>`
        })
    );
}

const setCompanyInfo = model => {
    $('.company-count').text(model.length);
    $('.company-avatar-group').html(
        model.map((p, i) => {
            return (i < 4 && p.photo) && `<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title=${p.firstname + ' ' + p.lastname} class="avatar avatar-sm pull-up">
                <img class="rounded-circle" src="/storage/${p.photo}" alt="${i}" />
            </li>`
        })
    );
}

const getInfo = () => {
    $.get('/account/system/info').then(async res => {
        const model = JSON.parse(res);

        await setAdminInfo(model.admins);
        setCompanyInfo(model.companies);
    });
}

$(function () {
    ('use strict');
    var dtUserTable = $('.user-list-table'),
        form = $('#editAdmin');

    getInfo();

    // Users List datatable
    if (dtUserTable.length) {
        var dt_basic = dtUserTable.DataTable({
        ajax: {url: '/account/system/index', dataSrc: ''}, // JSON file to add data
        columns: [
        // columns according to JSON
            { data: 'id' },
            { data: '' },
            { data: 'role_id' },
            { data: '' },
            { data: '' }
        ],
        columnDefs: [
            { targets: 0, visible: false },
            {
                targets: 1,
                responsivePriority: 4,
                render: function (data, type, full, meta) {
                    var $name = full['firstname'] + ' ' + full['lastname'];
                    $email = full['email'],
                    $image = full['photo'];
                    if ($image) {
                        // For Avatar image
                        var $output = '<img src="/storage/' + $image + '" alt="Avatar" height="32" width="32">';
                    } else {
                        // For Avatar badge
                        var stateNum = Math.floor(Math.random() * 6) + 1;
                        var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                        var $state = states[stateNum],
                            $name = full['firstname'] + ' ' + full['lastname'],
                            $initials = $name.match(/\b\w/g) || [];
                        $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                        $output = '<span class="avatar-content">' + $initials + '</span>';
                    }
                    var colorClass = $image === '' ? ' bg-light-' + $state + ' ' : '';
                    // Creates full output for row
                    var $row_output =
                    '<div class="d-flex justify-content-left align-items-center">' +
                    '<div class="avatar-wrapper">' +
                    '<div class="avatar ' +
                    colorClass +
                    ' me-1">' +
                    $output +
                    '</div>' +
                    '</div>' +
                    '<div class="d-flex flex-column">' +
                    '<a href="javascript:;" class="user_name text-body text-truncate"><span class="fw-bolder">' +
                    $name +
                    '</span></a>' +
                    '<small class="emp_post text-muted">' +
                    $email +
                    '</small>' +
                    '</div>' +
                    '</div>';
                    return $row_output;
                }
            },
            {
                // User Role
                targets: 2,
                render: function (data, type, full, meta) {
                    var $role = full['role_id'];
                    var roleBadgeObj = {
                        2: feather.icons['database'].toSvg({ class: 'font-medium-3 text-success me-50' }),
                        3: feather.icons['slack'].toSvg({ class: 'font-medium-3 text-danger me-50' })
                    };
                    const roleName = {
                        2: 'Company', 3: 'Administrator'
                    }
                    return "<span class='text-truncate align-middle'>" + roleBadgeObj[$role] + ' ' + roleName[$role] + '</span>';
                }
            },
            {
                // User Status
                targets: -2,
                render: function (data, type, full, meta) {
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
                title: 'Actions',
                orderable: false,
                render: function (data, type, full, meta) {
                    return (
                    '<a href="#admin-user" data-bs-toggle="modal" class="btn btn-sm btn-icon" onclick="setId(' + full['id'] + ')">' +
                        feather.icons['edit'].toSvg({ class: 'font-medium-3 text-body' }) +
                    '</a>'
                    );
                }
            }
        ],
        order: [[2, 'desc']],
        dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-50 mb-1"' +
        '<"col-sm-12 col-md-4 col-lg-6" l>' +
        '<"col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-md-end justify-content-center flex-sm-nowrap flex-wrap"<"me-1"f><"mt-50"B>>>' +
        '>t' +
        '<"d-flex justify-content-between mx-1 row"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
        buttons: [
            {
                extend: 'collection',
                className: 'btn btn-outline-primary dropdown-toggle',
                text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                buttons: [
                    {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                        className: 'dropdown-item',
                        exportOptions: { columns: [1, 3, 4] }
                    },
                    {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: { columns: [1, 3, 4] }
                    },
                    {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: { columns: [1, 3, 4] }
                    },
                ],
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                    $(node).parent().removeClass('btn-group');
                    setTimeout(function () {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                    }, 50);
                }
            }
        ],
        language: {
            sLengthMenu: 'Show _MENU_',
            search: 'Search',
            searchPlaceholder: 'Search..'
            }
        });
    }

    $('#photo').change(e => {target_file = e.target.files[0]});

    $('#addUser').click(e => {
        setId();
        target_file = '';
        $('#firstname').val('');
        $('#lastname').val('');
        $('#email').val('');
        $('#company').val('');
        $('#role').val('');
        $('#password').val('');
        $('#confirm').val('');
    });

    form.validate({
        rules: {
            'photo': {required: true},
            'role': {required: true},
            'firstname': {required: true},
            'lastname': {required: true},
            'email': {required: true, email: true},
            'password': {required: true},
            'confirm': {required: true, equalTo: '#password'}
        }
    });

    form.on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData();
        target_id && formData.append('id', target_id);
        target_file && formData.append('icon', target_file);
        formData.append('firstname', $('#firstname').val());
        formData.append('lastname', $('#lastname').val());
        formData.append('email', $('#email').val());
        formData.append('company', $('#company').val());
        formData.append('role', $('#role').val());
        formData.append('password', $('#password').val());
        formData.append('status', $('#status').is(':checked') ? 1 : -1);
        $.ajax({
            type: 'POST',
            url: '/account/system/save',
            data: formData,
            contentType: false,
            processData: false,
            success: data => {
                if(data > 0) {
                    dt_basic.ajax.reload();
                    toastr['success']('Account Information has been saved successfully.', 'Success!', {
                        closeButton: true, tapToDismiss: false
                    });
                    getInfo();
                    $('#firstname').val('');
                    $('#lastname').val('');
                    $('#email').val('');
                    $('#company').val('');
                    $('#role').val('');
                    $('#password').val('');
                    $('#confirm').val('');
                    $('.modal').modal('hide');
                } else {
                    toastr['error']('Failed to save.', 'Failed!', {
                        closeButton: true, tapToDismiss: false
                    });
                }
            }
        })
    });

    $('.user-list-table tbody').on('click', '.btn-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/account/system/change/${id}`).then(res => {
            if(res != 1) {
                $('.btn-status').prop('checked', false);
            }
        })
    });
});
