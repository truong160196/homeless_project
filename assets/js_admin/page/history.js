var run_waitMe = window.run_waitMe;

// history
var table_history = '#table_history';
var datatable_history;



$(function() {
    'use strict';
        // dashboard account
    $(table_history).ready(function () {
        if($(table_history).length){
            loadTableHistory();
        }
    });

    var loadTableHistory = function() {
        run_waitMe('.page-wrapper');
        if ($.fn.DataTable.isDataTable(table_history)) {
            $(table_history).DataTable().destroy();
            $('.table-unit tbody').empty();
        }

        var urlRequest =  '/api/admin/history';


        datatable_history = $(table_history).DataTable({
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
                [3, 'desc']
            ],
            "columns": [
                {
                    "data": "type"
                },
                {
                    "data": "token"
                },
                {
                    "data": "amount"
                },
                {
                    "data": "time_transaction",
                    "type": "datetime",
                },
                {
                    "data": "hash",
                    "render": function ( data, type, row, meta ) {
                        if (data) {
                            var dataHash = data.slice(0, 10) + '...' + data.slice(data.length - 10, data.length);
                            return '<a href="https://ropsten.etherscan.io/tx/'+data+'" target="_blank">' + dataHash +'</a>';
                        } else {
                            return '';
                        }
                    }
                },
                {
                    "data": "status",
                    "render": function ( data, type, row, meta ) {
                        if (data === 'pending') {
                            return '<span class="badge badge-warning">'+ data + '</span>'
                        }
                        if (data === 'complete') {
                            return '<span class="badge badge-success">'+ data + '</span>'
                        }
                        if (data === 'fail') {
                            return '<span class="badge badge-danger">'+ data + '</span>'
                        }
                    }
                },
            ],
            columnDefs: [],
            "initComplete": function(settings, json) {
                run_waitMe('.page-wrapper', true);
            },
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('data-id', aData.id);
            }
        }).on('processing.dt', function(e, settings, processing) {
            if (processing) {
                run_waitMe('.page-wrapper');
            } else {
                run_waitMe('.page-wrapper', true);
            }
        });
    };
});