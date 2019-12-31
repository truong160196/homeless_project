var table_order = "#order_table";
var datatable_user;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';

    $(document).ready(function() {
        $(table_order).ready(function() {
            loadTableUnit();

        });
    })

    var loadTableUnit = function() {
        // run_waitMe('.main-panel');
        if ($.fn.DataTable.isDataTable(table_order)) {
            $(table_order).DataTable().destroy();
            $('.table-unit tbody').empty();
        }
        var urlRequest =  '/api/admin/order';


        datatable_user = $(table_order).DataTable({
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
            "columns": [
                {
                    "data": "id"
                },
                {
                    "data": "order_total"
                },
                {
                    "data": "order_tax"
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
            columnDefs: [],
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
    var clearFormCreate = function () {
        $("#product_name").text("");
        $("#product_quantity").text("");
        $("#product_price").text("");
    };
    $(document).on('click','.btn-view-order', function(e) {
        clearFormCreate();
        var id = e.currentTarget.dataset.id;
        var url = base_ajax + '/admin/order/detail/'+id;
        openModalView(id, url);
    });

    var openModalView = function (id, url) {
        // clearFormCreate();
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id},
            success: function(response) {
                if (response.data) {
                    var order = response.data;
                  
                    for(let listproduct of order){
                        $("#id_order").val(listproduct.order_id);
                        $("#order_total").val(listproduct.order_total);
                        $("#order_tax").val(listproduct.order_tax);
                        $("#order_hash").val(listproduct.hash);
                        $("#order_status").val(listproduct.status ? listproduct.stauts : "");                   
                        $("#id_order").parent().addClass("is-filled");
                        $("#order_total").parent().addClass("is-filled");
                        $("#order_tax").parent().addClass("is-filled");
                        $("#order_hash").parent().addClass("is-filled");
                        $("#order_status").parent().addClass("is-filled");
                        $("#order_total").val(listproduct.order_total);
                        $("#order_tax").val(listproduct.order_tax);
                        $("#product_name").append("<li>"+listproduct.product_name+"</li>");
                        $("#product_quantity").append("<li>"+listproduct.quantity+"</li>");
                        $("#product_price").append("<li>"+listproduct.price+"</li>");
                    }
                    $('#modal_order_view').modal('show');

                }
            },

            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });            
            }
        });
    };

});