/*=========================================================================================
    File Name: app-user-view-account.js
    Description: User View Account page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';

    // Variable declaration for table
    var dt_project_table = $('.driver-table'),
      assetPath = '../../../app-assets/';

    if ($('body').attr('data-framework') === 'laravel') {
      assetPath = $('body').attr('data-asset-path');
    }

    // Project datatable
    // --------------------------------------------------------------------

    if (dt_project_table.length) {
      dt_project_table.DataTable({
        ajax: assetPath + 'data/table-datatable.json', // JSON file to add data
        ordering: false,
        columns: [
          // columns according to JSON
          { data: 'id' },
          { data: 'city' },
          { data: 'post' },
          { data: 'full_name' },
          { data: 'status' },
          { data: '' }
        ],
        columnDefs: [
          {
            targets: -1,
            title: 'Actions',
            width: '80px',
            orderable: false,
            render: function (data, type, full, meta) {
                return (
                    '<div class="d-flex align-items-center col-actions">' +
                    '<a class="me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Mail">' +
                    feather.icons['send'].toSvg({ class: 'font-medium-2 text-body' }) +
                    '</a>' +
                    '<a class="me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Invoice">' +
                    feather.icons['eye'].toSvg({ class: 'font-medium-2 text-body' }) +
                    '</a>' +
                    '<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Download">' +
                    feather.icons['download'].toSvg({ class: 'font-medium-2 text-body' }) +
                    '</a>'
                );
            }
          }
        ],
        order: [[1, 'desc']],
        dom: 't',
        displayLength: 7,
        language: {
          sLengthMenu: 'Show _MENU_',
          // search: '',
          searchPlaceholder: 'Search Project'
        },
        // For responsive popup
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function (row) {
                var data = row.data();
                return 'Details of ' + data['full_name'];
              }
            }),
            type: 'column',
            renderer: function (api, rowIdx, columns) {
              var data = $.map(columns, function (col, i) {
                return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                  ? '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                      '<td>' + col.title + ':' + '</td> ' +
                      '<td>' + col.data + '</td>' +
                      '</tr>' : '';
              }).join('');

              return data ? $('<table class="table"/><tbody />').append(data) : false;
            }
          }
        }
      });
    }
})
