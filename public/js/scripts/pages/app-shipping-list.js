
$(function () {
    ('use strict');
    
    var assetPath = '../../../public/storage/';
    var surveysTable = $('.shipping-list-table');
    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
    }
    surveysTable.DataTable({
        ajax: assetPath +'storage/tables/table-shipping-list.json',
        columns: [
        { data: 'code' },
        { data: 'monthsend' },
        { data: 'type' },
        { data: 'countSurvey' },
        { data: 'owner' },
        { data: 'status' },
        { data: '' }
        ],
        columnDefs: [
            {
                targets: 1,
            },
            {
                targets: 2,
            },
            {
                targets: 3,
            },
            {
                targets: 4,
            },
            {
                targets: 5,
            },
            {
                targets: 6,
            },
        ],
        order: [[1, 'desc']],
        dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
        language: {
            sLengthMenu: 'Show _MENU_',
            search: 'Search',
            searchPlaceholder: 'Search..',
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        },
        buttons: [
            {
              extend: 'collection',
              className: 'btn btn-outline-secondary dropdown-toggle me-2',
              text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
              buttons: [
                {
                  extend: 'print',
                  text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                  className: 'dropdown-item',
                  exportOptions: { columns: [1, 2, 3, 4, 5,6] }
                },
                {
                  extend: 'csv',
                  text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                  className: 'dropdown-item',
                  exportOptions: { columns: [1, 2, 3, 4, 5,6] }
                },
                {
                  extend: 'excel',
                  text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                  className: 'dropdown-item',
                  exportOptions: { columns: [1, 2, 3, 4, 5,6] }
                },
                {
                  extend: 'pdf',
                  text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                  className: 'dropdown-item',
                  exportOptions: { columns: [1, 2, 3, 4, 5,6] }
                },
                {
                  extend: 'copy',
                  text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                  className: 'dropdown-item',
                  exportOptions: { columns: [1, 2, 3, 4, 5,6] }
                }
              ],
              init: function (api, node, config) {
                $(node).removeClass('btn-secondary');
                $(node).parent().removeClass('btn-group');
                setTimeout(function () {
                  $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
                }, 50);
              }
            }
          ],
        // Scroll options
    });
});