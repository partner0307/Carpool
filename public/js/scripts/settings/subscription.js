/**
 * DataTables Basic
 */

let sub_target_id = '';
const subSetId = id => {
    sub_target_id = id ? id : null;
    $.get(`/settings/general/subscription/edit/${id}`).then(data => {
        $('#sub-title').val(data.title);
        $('#sub-description').val(data.description);
        $('#sub-cost').val(data.cost);
        $('#sub-status').attr('checked', data.status === 1 ? true : false);
        $('#sub-icon-upload-img').attr('src', '/storage/' + (id ? data.icon : 'images/temp/sample.png'));
    })
}

 $(function () {
    'use strict';

    var subscription_table = $('.subscription'),
        target_file = '',
        icon_image = $('#sub-icon-upload-img'),
        reset_icon = $('#sub-icon-upload-img').attr('src'),
        form = $('#editSub');

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (subscription_table.length) {
        var sub_basic = subscription_table.DataTable({
            ajax: {url: '/settings/general/subscription/index', dataSrc: ''},
            columns: [
                { data: 'id' },
                { data: '' },
                { data: 'title' },
                { data: 'description' },
                { data: 'cost' },
                { data: '' },
                { data: '' }
            ],
            columnDefs: [
            { targets: 0 },
            {
                targets: 1,
                orderable: false,
                render: (data, type, full, meta) => {
                    const icon = full['icon'];
                    return icon && `<img src="/storage/${icon}" alt="icon" width="32" height="32">`;
                }
            },
            { targets: 2 },
            { targets: 3 },
            { targets: 4, render: (data, type, full, meta) => {return `$${full['cost']}`} },
            {
                // Label
                targets: -2,
                orderable: false,
                render: function (data, type, full, meta) {
                    let $status = full['status'];
                    return (
                        `<div class="form-check form-switch form-check-primary text-center">` +
                        `<input type="checkbox" class="form-check-input sub-status" id="substatus_${full['id']}" ${$status == 1 && 'checked'} />` +
                        `<label class="form-check-label" for="substatus_${full['id']}">` +
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
                        '<a href="#subscription-modal" data-bs-toggle="modal" class="item-edit text-dark" onclick="subSetId(' + full['id'] + ')">' +
                            feather.icons['edit'].toSvg({ class: 'font-medium-3' }) +
                        '</a>' +
                        '<a href="javascript:;" class="item-remove text-dark sub-delete-record" id="' + full['id'] + '">' +
                            feather.icons['trash'].toSvg({ class: 'font-medium-3' }) +
                        '</a>' +
                        '</div>'
                    );
                }
            }
            ],
            order: [[2, 'desc']],
            dom: '<"card-header border-bottom p-1"<"subscription-header"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 5,
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, 'All']],
            buttons: [
            {
                text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Add Subscription',
                className: 'sub-new btn btn-primary mx-2',
                attr: {
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#subscription-modal'
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
        $('div.subscription-header').html('<h5 class="mb-0">Subscription</h5>');

        $('.sub-new').click(e => {subSetId()});

        $("#sub-icon").change(e => {
            target_file = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function () {
                icon_image.attr('src', reader.result);
            }
        });

        $('#sub-icon-reset').click(e => {
            icon_image.attr('src', reset_icon);
            target_file = '';
        });

        form.validate({
            rules: {
                'sub-icon': {required: true},
                'sub-title': {required: true},
                'sub-description': {required: true},
                'sub-cost': {required: true}
            }
        });

        form.on('submit', e => {
            e.preventDefault();
            let formData = new FormData();
            sub_target_id && formData.append('id', sub_target_id);
            target_file && formData.append('icon', target_file);
            formData.append('title', $('#sub-title').val());
            formData.append('description', $('#sub-description').val());
            formData.append('cost', $('#sub-cost').val());
            formData.append('status', $('#sub-status').is(':checked') ? 1 : -1);
            $.ajax({
                type: 'POST',
                url: '/settings/general/subscription/save',
                data: formData,
                contentType: false,
                processData: false,
                success: data => {
                    const model = JSON.parse(data);
                    if(model.id > 0) {
                        if(sub_target_id) {
                            sub_basic.ajax.reload();
                        } else {
                            sub_basic.row.add({
                                id: model.id,
                                icon: model.icon,
                                title: $('#sub-title').val(),
                                description: $('#sub-description').val(),
                                cost: $('#sub-cost').val(),
                                status: $('#sub-status').is(':checked') ? 1 : -1
                            }).draw();
                        }
                        toastr['success']('Subscription has been saved successfully.', 'Success!', {
                            closeButton: true, tapToDismiss: false
                        });
                    } else {
                        toastr['error']('Failed to save.', 'Failed!', {
                            closeButton: true, tapToDismiss: false
                        });
                    }
                    $('.modal').modal('hide');
                }
            })
        });
    }

    $('.subscription tbody').on('click', '.sub-status', function () {
        const id = $(this).attr('id').split('_')[1];
        $.get(`/settings/general/subscription/change/${id}`).then(res => {
            if(res != 1) {
                $('.sub-status').prop('checked', false);
            }
        })
    });

    $('.subscription tbody').on('click', '.sub-delete-record', async function () {
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
                $.get(`/settings/general/subscription/remove/${target}`, res => {
                    if(res == 1) {
                        toastr['success']('Subscription has been saved successfully.', 'Success!', {
                            closeButton: true, tapToDismiss: false
                        });
                        sub_basic.ajax.reload();
                    }
                })
            }
        });
    });
});
