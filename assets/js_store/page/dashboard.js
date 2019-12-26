var run_waitMe = window.run_waitMe;

// withdraw
var table_order = '#table_order';
var datatable_order;

$(function() {
    'use strict';
    
    // Withdraw
    $(table_order).ready(function () {
        if($(table_order).length){
            loadTableWithdraw();
        }
    });

    var loadTableWithdraw = function() {
        run_waitMe('.page-wrapper');
        if ($.fn.DataTable.isDataTable(table_order)) {
            $(table_order).DataTable().destroy();
            $('.table-unit tbody').empty();
        }

        var urlRequest =   base_ajax + '/store/order/list';


        datatable_order = $(table_order).DataTable({
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
            "lengthMenu": [5, 10, 20],
            "order": [
                [1, 'desc']
            ],
            "columns": [
                {
                    "data": "id"
                },
                {
                    "data": "created_at"
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
                    "data": "order_total"
                },
                {
                    "data": "status",
                    "render": function ( data, type, row, meta ) {
                        if (data === 'pending') {
                            return '<span class="badge badge-warning">'+ data + '</span>'
                        }
                        if (data === 'success') {
                            return '<span class="badge badge-success">'+ data + '</span>'
                        }
                        if (data === 'fail') {
                            return '<span class="badge badge-danger">'+ data + '</span>'
                        }
                        return '';
                    }
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                },
            ],
            columnDefs: [
                { "width": "15%", "targets": [1, 3] },
                { "width": "25%", "class": "text-left",  "targets": [2] },
                { "width": "10%", "targets": [4, 5] },
                { "width": "5%", "targets": [0] }
            ],
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

    var reloadTableWithdraw = function() {
        $(table_order).DataTable().ajax.reload();
    };
});