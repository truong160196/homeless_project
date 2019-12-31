var table_user = "#user_table";
var datatable_user;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';

    $(document).ready(function() {
        $(table_user).ready(function() {
            loadTableUnit();
        });
    })

    var loadTableUnit = function() {
        // run_waitMe('.main-panel');
        if ($.fn.DataTable.isDataTable(table_user)) {
            $(table_user).DataTable().destroy();
            $('.table-unit tbody').empty();
        }
        var urlRequest =  '/api/admin/user';


        datatable_user = $(table_user).DataTable({
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
                    "data": "username"
                },
                {
                    "data": "full_name"
                },
                {
                    "data": "role"
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
                minimumResultsForSearch: -1
            });
        }
    }

    var clearFormCreate = function () {
        $('#username').val('');
        $('#password').val('');
        $('#full_name').val('');
        $('#phone').val('');
        $('#birthday').val('');
        $('#email').val('');
        $('#user_type').val('');
        $('#address_user').val('');
        $('#status').val('');
        $('#role_id').val('');
    };

    $(document).on('click', '#btn_create_user', function(e) {
        openModalCreateUser();
        e.preventDefault();
    });

    var openModalCreateUser = function () {
        clearFormCreate();
        $('#modal_user_create').modal('show');

        $('#birthday').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 1,
            autoUpdateInput: true,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            }
        });
    }


    $(document).on('click', '#btn_create', function(e) {
        e.preventDefault();
        $('#form_create_user').submit();
    });


    $("#form_create_user").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            createUserSubmitFrom();
        }
    });

    var createUserSubmitFrom = function () {
        run_waitMe('.limiter');
        var url = base_ajax + '/admin/user/create';
        var dataForm = $("#form_create_user").serialize();

        var accountWallet = blockchain.createAddress();

        dataForm += '&address=' + accountWallet.address;
        dataForm += '&privateKey=' + accountWallet.privateKey;
        dataForm += '&publicKey=' + accountWallet.publicKey;

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });

                    clearFormCreate();

                    $('#modal_user_create').modal('hide');
                    loadTableUnit();
                } else {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops',
                        text: response.msg
                    });
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
        run_waitMe('.limiter', true);
    }
});