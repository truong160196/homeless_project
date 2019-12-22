var run_waitMe = window.run_waitMe;

// withdraw
var table_withdraw = '#table_withdraw';
var datatable_withdraw;

// history
var table_history = '#table_history';
var datatable_history;

// deposit
var table_deposit = '#table_deposit';
var datatable_deposit;


var loadBalanceEth;
var loadBalanceDonate;
var loadAddress;

var getDonateFree;

$(function() {
    'use strict';

    $(document).ready(function() {
        $('#balanceEth').text('');
        $('#estimateUSD').text('');
        $('#balanceEth').addClass('loading');


        $('#balanceDonate').addClass('loading');
        $('#balanceDonate').text('');
        setTimeout((function () {
            initLoadDataBlockchain();

            $('#balanceEth').removeClass('loading');
            $('#balanceDonate').removeClass('loading');

            blockchain.subscriptionLog(function (data) {
                initLoadDataBlockchain();
            })
        }), 1800);
    });

    var initLoadDataBlockchain = function () {
        loadBalanceEth();
        loadBalanceDonate();
        loadAddress();
    };

    loadBalanceEth = async function () {
        const balanceEth = await blockchain.getBalanceEth();
        if (balanceEth) {
            $('#balanceEth').text(balanceEth + ' ETH');

            const valueEstimate = Number(balanceEth) * 150;
            $('#estimateUSD').text('Estimated Value: ~ ' + blockchain.formatCurrency(valueEstimate) + ' USD');
        } else {
            $('#balanceEth').text('0 ETH');
            $('#estimateUSD').text('Estimated Value: ~ ' + 0 + ' USD');
        }
    };

    loadBalanceDonate = async function () {
        const balanceDonate = await blockchain.getBalanceDonate();
        if (balanceDonate) {
            $('#balanceDonate').text(balanceDonate + ' USD');
        } else {
            $('#balanceDonate').text('0 USD');
        }
    };

    loadAddress = async function () {
        const wallet = blockchain.getWallet();

        if (wallet) {
            $('#wallet').val(wallet);
        } else {
            $('#wallet').val('');
        }
    };

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

        const id = $('#id_user').val();

        var urlRequest =  '/api/user/transaction/history?id=' + id;


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

    var reloadTableHistory = function() {
        $(table_history).DataTable().ajax.reload();
    };

    var loadFormUser = function (data) {
        $('#id').val(data.id);
        $('#username').val(data.username);
        $('#full_name').val(data.full_name);
        $('#phone').val(data.phone);
        $('#birthday').val(data.birthday);
        $('#email').val(data.email);
        $('#address_user').val(data.address);
    };

    $(document).on('click', '#btn_open_modal_user', function(e) {
        openModalCreateUser();
        const id = $('#id_user').val();

        getUserDetail(id);
        e.preventDefault();
    });

    var openModalCreateUser = function () {
        $('#modal_user_edit').modal('show');

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


    $(document).on('click', '#btn_edit', function(e) {
        e.preventDefault();
        $('#form_edit_user').submit();
    });


    $("#form_edit_user").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            eidtUserSubmitFrom();
        }
    });

    var getUserDetail = function (id) {
        run_waitMe('.page-wrapper');
        var url = base_ajax + '/user/account/detail/' + id;

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                loadFormUser(response.data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
            }
        });
        run_waitMe('.page-wrapper', true);
    };

    var eidtUserSubmitFrom = function () {
        run_waitMe('.page-wrapper');
        var url = base_ajax + '/user/account/update';
        var dataForm = $("#form_edit_user").serialize();

        const id = $('#id').val();

        dataForm += '&id=' + id;
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

                    $('#modal_user_edit').modal('hide');
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
        run_waitMe('.page-wrapper', true);
    }


    // Withdraw
    $(table_withdraw).ready(function () {
        if($(table_withdraw).length){
            loadTableWithdraw();
        }
    });

    var loadTableWithdraw = function() {
        run_waitMe('.page-wrapper');
        if ($.fn.DataTable.isDataTable(table_withdraw)) {
            $(table_withdraw).DataTable().destroy();
            $('.table-unit tbody').empty();
        }

        const id = $('#id_user').val();

        var urlRequest =  '/api/user/transaction/withdraw?id=' + id;


        datatable_withdraw = $(table_withdraw).DataTable({
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
                        return '';
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

    var reloadTableWithdraw = function() {
        $(table_withdraw).DataTable().ajax.reload();
    };

    $(document).on('click', '#btn_withdraw', function(e) {
        e.preventDefault();
        $('#form_withdraw').submit();
    });


    $("#form_withdraw").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            withdrawUSD();
        }
    });


    var withdrawUSD = async function () {
        run_waitMe('.page-wrapper');
        try {
            var url = base_ajax + '/user/account/withdraw';
            var dataForm = $("#form_withdraw").serialize();

            const id = $('#id_user').val();
            const address = $('#address_wallet').val();
            const token = $('#token').val();
            const amount = $('#amount').val();

            let result = {
                status: false,
            };

            if (token && token === "USD") {
                result = await blockchain.sendTransactionDonate(address, amount);
            }

            if (token && token === "ETH") {
                result = await blockchain.withdrawEth(address, amount);
            }

            if (result.status === true && result.message) {

                dataForm += '&id=' + id;
                dataForm += '&hash=' + result.message;
                dataForm += '&fee=' + 1;

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

                            reloadTableWithdraw();
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
            } else {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: result.message || 'There was an error during processing'
                });
            }
            run_waitMe('.page-wrapper', true);
        } catch (e) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: result.message || 'There was an error during processing'
            });
            run_waitMe('.page-wrapper', true);
        }
    };

    // deposit

    $(table_deposit).ready(function () {
        if($(table_deposit).length){
            loadTableDeposit();
        }
    });

    var loadTableDeposit = function() {
        run_waitMe('.page-wrapper');
        if ($.fn.DataTable.isDataTable(table_deposit)) {
            $(table_deposit).DataTable().destroy();
            $('.table-unit tbody').empty();
        }
        const id = $('#id_user').val();

        var urlRequest =  '/api/user/transaction/deposit?id=' + id;


        datatable_deposit = $(table_deposit).DataTable({
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
                        return '';
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

    var reloadTableDeposit = function() {
        $(table_deposit).DataTable().ajax.reload();
    };
});