var table_auction = "#auction_table";
var datatable_action;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';

    $(document).ready(function() {
        $(table_auction).ready(function() {
            loadTableUnit();
        });
    })

    var loadTableUnit = function() {
        // run_waitMe('.main-panel');
        if ($.fn.DataTable.isDataTable(table_auction)) {
            $(table_auction).DataTable().destroy();
            $('.table-unit tbody').empty();
        }
        var urlRequest = '/';


        datatable_action = $(table_auction).DataTable({
            autoWidth: false,
            "processing": true,
            "serverSide": true,
            "ajax": urlRequest,
            "bInfo": false,
            "pagingType": "full_numbers",
            "language": {
                searchPlaceholder: 'Search...',
                sSearch: ''
            },
            "sLengthSelect": "select2",
            "responsive": true,
            "order": [
                [0, 'desc']
            ],
            "columns": [{
                "data": "id"
            },
                {
                    "data": "name"
                },
                {
                    "data": "products",
                    name: 'products.name',
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                }
            ],
            columnDefs: [{
                targets: [1, 2],
                'class': 'multi-line',
            },
                {
                    targets: [-1],
                    'class': 'text-center',
                }
            ],
            "initComplete": function(settings, json) {
                run_waitMe('.main-panel', true);
            },
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('data-id', aData.id);
            }
        }).on('processing.dt', function(e, settings, processing) {
            if (processing) {
                run_waitMe('.main-panel');
            } else {
                run_waitMe('.main-panel', true);
            }
        });

        if ($('.dataTables_length select').length > 0) {
            $('.dataTables_length select').select2({
                minimumResultsForSearch: ''
            });
        }
    }
});