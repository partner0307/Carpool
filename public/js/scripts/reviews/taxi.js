/**
 * DataTables Basic
 */

 $(async function () {
    'use strict';

    let taxi_customer = $('.taxi-customer'),
      assetPath = '../../../app-assets/';

    let taxi_driver = $('.taxi-driver');

    if ($('body').attr('data-framework') === 'laravel') {
      assetPath = $('body').attr('data-asset-path');
    }

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (taxi_customer.length) {
      taxi_customer.DataTable({
        ajax: assetPath + 'data/table-datatable.json',
        columns: [
          { data: 'full_name' },
          { data: 'id' },
          { data: 'id' },
          { data: 'full_name' },
          { data: 'post' },
          { data: 'status' },
          { data: 'experience' },
          { data: '' }
        ],
        columnDefs: [
          {
            // Avatar image/badge, Name and post
            targets: 0,
            render: function (data, type, full, meta) {
              var $user_img = full['avatar'],
                $name = full['full_name'],
                $post = full['post'];
              if ($user_img) {
                // For Avatar image
                var $output =
                  '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
              } else {
                // For Avatar badge
                var stateNum = full['status'];
                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                var $state = states[stateNum],
                  $name = full['full_name'],
                  $initials = $name.match(/\b\w/g) || [];
                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                $output = '<span class="avatar-content">' + $initials + '</span>';
              }

              var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
              // Creates full output for row
              var $row_output =
                '<div class="d-flex justify-content-left align-items-center">' +
                '<div class="avatar ' +
                colorClass +
                ' me-1">' +
                $output +
                '</div>' +
                '<div class="d-flex flex-column">' +
                '<span class="emp_name text-truncate fw-bold">' +
                $name +
                '</span>' +
                '<small class="emp_post text-truncate text-muted">' +
                $post +
                '</small>' +
                '</div>' +
                '</div>';
              return $row_output;
            }
          },
          { targets: 1 },
          { targets: 2 },
          {
            // Avatar image/badge, Name and post
            targets: 3,
            render: function (data, type, full, meta) {
              var $user_img = full['avatar'],
                $name = full['full_name'],
                $post = full['post'];
              if ($user_img) {
                // For Avatar image
                var $output =
                  '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
              } else {
                // For Avatar badge
                var stateNum = full['status'];
                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                var $state = states[stateNum],
                  $name = full['full_name'],
                  $initials = $name.match(/\b\w/g) || [];
                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                $output = '<span class="avatar-content">' + $initials + '</span>';
              }

              var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
              // Creates full output for row
              var $row_output =
                '<div class="d-flex justify-content-left align-items-center">' +
                    '<div class="avatar ' + colorClass + ' me-1">' + $output + '</div>' +
                    '<div class="d-flex flex-column">' +
                        '<span class="emp_name text-truncate fw-bold">' + $name + '</span>' +
                        '<small class="emp_post text-truncate text-muted">' + $post + '</small>' +
                    '</div>' +
                '</div>';
              return $row_output;
            }
          },
          { targets: 4 },
          {
              targets: 5,
              render: function (data, type, full, meta) {
                  const rate = full['status'];
                  return `<div class="d-flex justify-content-center align-items-center">
                    <span class="me-1">${rate}</span>
                    <i data-feather="star" style="width:20px; height:20px;color:#fff;background:#ff9f43;padding:3px;border-radius:50%"/>
                  </div>`
              }
          },
          { targets: -2 },
          {
            // Actions
            targets: -1,
            className: 'text-center',
            title: 'Actions',
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<a href="javascript:;" class="item-edit text-dark">' +
                  '<i data-feather="eye" style="width:20px;height:20px">' +
                '</a>'
              );
            }
          }
        ],
        order: [[2, 'desc']],
        dom: '<"card-header border-bottom p-1"<"head-label-customer"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
        }
      });
      $('div.head-label-customer').html('<h5 class="mb-0">Customer Reviews</h5>');
    }

    if (taxi_driver.length) {
        taxi_driver.DataTable({
          ajax: assetPath + 'data/table-datatable.json',
          columns: [
            { data: 'full_name' },
            { data: 'id' },
            { data: 'id' },
            { data: 'full_name' },
            { data: 'post' },
            { data: 'status' },
            { data: 'experience' },
            { data: '' }
          ],
          columnDefs: [
            {
              // Avatar image/badge, Name and post
              targets: 0,
              render: function (data, type, full, meta) {
                var $user_img = full['avatar'],
                  $name = full['full_name'],
                  $post = full['post'];
                if ($user_img) {
                  // For Avatar image
                  var $output =
                    '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
                } else {
                  // For Avatar badge
                  var stateNum = full['status'];
                  var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                  var $state = states[stateNum],
                    $name = full['full_name'],
                    $initials = $name.match(/\b\w/g) || [];
                  $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                  $output = '<span class="avatar-content">' + $initials + '</span>';
                }

                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-left align-items-center">' +
                  '<div class="avatar ' +
                  colorClass +
                  ' me-1">' +
                  $output +
                  '</div>' +
                  '<div class="d-flex flex-column">' +
                  '<span class="emp_name text-truncate fw-bold">' +
                  $name +
                  '</span>' +
                  '<small class="emp_post text-truncate text-muted">' +
                  $post +
                  '</small>' +
                  '</div>' +
                  '</div>';
                return $row_output;
              }
            },
            { targets: 1 },
            { targets: 2 },
            {
              // Avatar image/badge, Name and post
              targets: 3,
              render: function (data, type, full, meta) {
                var $user_img = full['avatar'],
                  $name = full['full_name'],
                  $post = full['post'];
                if ($user_img) {
                  // For Avatar image
                  var $output =
                    '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
                } else {
                  // For Avatar badge
                  var stateNum = full['status'];
                  var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                  var $state = states[stateNum],
                    $name = full['full_name'],
                    $initials = $name.match(/\b\w/g) || [];
                  $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                  $output = '<span class="avatar-content">' + $initials + '</span>';
                }

                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-left align-items-center">' +
                      '<div class="avatar ' + colorClass + ' me-1">' + $output + '</div>' +
                      '<div class="d-flex flex-column">' +
                          '<span class="emp_name text-truncate fw-bold">' + $name + '</span>' +
                          '<small class="emp_post text-truncate text-muted">' + $post + '</small>' +
                      '</div>' +
                  '</div>';
                return $row_output;
              }
            },
            { targets: 4 },
            {
                targets: 5,
                render: function (data, type, full, meta) {
                    const rate = full['status'];
                    return `<div class="d-flex justify-content-center align-items-center">
                      <span class="me-1">${rate}</span>
                      <i data-feather="star" style="width:20px; height:20px;color:#fff;background:#ff9f43;padding:3px;border-radius:50%"/>
                    </div>`
                }
            },
            { targets: -2 },
            {
              // Actions
              targets: -1,
              className: 'text-center',
              title: 'Actions',
              orderable: false,
              render: function (data, type, full, meta) {
                return (
                  '<a href="javascript:;" class="item-edit text-dark">' +
                    '<i data-feather="eye" style="width:20px;height:20px">' +
                  '</a>'
                );
              }
            }
          ],
          order: [[2, 'desc']],
          dom: '<"card-header border-bottom p-1"<"head-label-driver"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
          }
        });
        $('div.head-label-driver').html('<h5 class="mb-0">Driver Reviews</h5>');
      }
  });
