var run_waitMe = window.run_waitMe;

// history
var table_history = '#table_history';
var datatable_history;



$(function() {
    'use strict';
        // dashboard account
        $(document).ready(function() {
            $(table_history).ready(function() {
                loadTableUnit();
    
            });
        })
    
        var loadTableUnit = function() {
            // run_waitMe('.main-panel');
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
                    [0, 'desc']
                ],
                "columns": [
                    {
                        "data": "id"
                    },
                    {
                        "data": "value"
                    },
                    {
                        "data": "hash"
                    },
                    {
                        "data": "status"
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
        $(document).on('click','.btn-view-history', function(e) {
            clearFormCreate();
            var id = e.currentTarget.dataset.id;
            var url = base_ajax + '/admin/history/detail/'+id;
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
                        var history = response.data;
                      
                        $("#id_history").val(history.id);
                        $("#history_value").val(history.value);
                        $("#history_hash").val(history.hash);
                        $("#history_status").val(history.status);                  
                        $("#id_history").parent().addClass("is-filled");
                        $("#history_value").parent().addClass("is-filled");
                        $("#history_hash").parent().addClass("is-filled");
                        $("#history_status").parent().addClass("is-filled");
                        $('#modal_history_view').modal('show');
    
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