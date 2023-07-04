
$(function () {
    ('use strict');
    
    var assetPath = '../../../public/storage/';
    userView = 'app-user-view-account.html';
    var surveysTable = $('.surveys-list-table');
    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
    }
    surveysTable.DataTable({
        ajax: assetPath +'storage/tables/table-surveys-list.json',
        columns: [
        { data: 'code' },
        { data: 'type' },
        { data: 'progressName' },
        { data: 'owner' },
        { data: 'date_final' },
        { data: 'date_survey' },
        { data: 'progress_number' },
        { data: 'status' },
        { data: '' }
        ],
        columnDefs: [
            {
                targets: 1,
                responsivePriority: 1,
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
                render: function(data, type, full, meta) {
                    var percent = full['progress_number'];
                    return ('<div class="progress"><div class="progress-bar" role="progressbar" style="width:'+percent+'%;" aria-valuenow="'+percent+'" aria-valuemin="0" aria-valuemax="100" title="'+percent+'%">'+percent+'%</div></div>');
                }
            },
            {
                // Label
                targets: 7,
                render: function (data, type, full, meta) {
                    console.log(full);
                    var $status_number = full['status'];
                    var $status = {
                        1: { title: 'Cadastro', class: 'bg-label-primary' },
                        2: { title: 'Enviado', class: 'bg-label-success' },
                        4: { title: 'Pendente', class: 'bg-label-warning' },
                        5: { title: 'Aprovado', class: 'bg-label-info' }
                    };
                    if (typeof $status[$status_number] === 'undefined') {
                        return data;
                    }
                    return (
                        '<span class="badge ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span>'
                    );
                }
            },
    
            {
                // Actions
                targets: 8,
                title: 'Ações',
                searchable: false,
                orderable: false,
                render: function (data, type, full, meta) {
                    return (
                        '<div class="btn-group">' +
                        '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                        feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                        '</a>' +
                        '<div class="dropdown-menu dropdown-menu-end">' +
                        '<a href="' +
                        assetPath + 'user/view/account/'+ full['id'] +
                        '" class="dropdown-item">' +
                        feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
                        'Details</a>' +
                        '<a href="javascript:;" class="dropdown-item delete-record">' +
                        feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
                        'Delete</a></div>' +
                        '</div>' +
                        '</div>'
                    );
                }
            }
        ],
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
                  exportOptions: { columns: [0,1, 2, 3, 4, 5,6,7] }
                },
                {
                  extend: 'csv',
                  text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                  className: 'dropdown-item',
                  exportOptions: { columns: [0,1, 2, 3, 4, 5,6,7] }
                },
                {
                  extend: 'excel',
                  text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                  className: 'dropdown-item',
                  exportOptions: { columns: [0,1, 2, 3, 4, 5,6,7] }
                },
                {
                  extend: 'pdf',
                  text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                  className: 'dropdown-item',
                  exportOptions: { columns: [0,1, 2, 3, 4, 5,6,7] }
                },
                {
                  extend: 'copy',
                  text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                  className: 'dropdown-item',
                  exportOptions: { columns: [0,1, 2, 3, 4, 5,6,7] }
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