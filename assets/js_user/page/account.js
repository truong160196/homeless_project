var table_user = "#user_table";
var datatable_user;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';
    var id_user = '';

    $(document).ready(function() {
        setTimeout((function () {
            loadBalanceEth();
            loadBalanceDonate();
            loadAddress();
        }), 900);
    });

    var loadBalanceEth = async function () {
        const balanceEth = await blockchain.getBalanceEth();
        if (balanceEth) {
            $('#balanceEth').text(balanceEth + ' ETH');

            const valueEstimate = Number(balanceEth) * 150;
            $('#estimateUSD').text('Estimated Value: ~ ' + valueEstimate + ' USD');
        } else {
            $('#balanceEth').text('0 ETH');
            $('#estimateUSD').text('Estimated Value: ~ ' + 0 + ' USD');
        }
    };

    var loadBalanceDonate = async function () {
        const balanceDonate = await blockchain.getBalanceDonate();
        if (balanceDonate) {
            $('#balanceDonate').text(balanceDonate + ' USD');
        } else {
            $('#balanceDonate').text('0 USD');
        }
    };

    var loadAddress = async function () {
        const wallet = blockchain.getWallet();

        if (wallet) {
            $('#wallet').val(wallet);
        } else {
            $('#wallet').val('');
        }
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
    }
    
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
    $(document).on('click', '#btn_withdraw', function(e) {
        e.preventDefault();
        $('#form_withdraw').submit();
    });


    $("#form_withdraw").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            withdrawEth();
        }
    });

    var withdrawEth = function () {
        run_waitMe('.page-wrapper');
        var url = base_ajax + '/user/account/withdraw';
        var dataForm = $("#form_edit_user").serialize();

        const id = $('#id_user').val();

        dataForm += '&id=' + id;
        dataForm += '&hash=' + '0x9d18065fd38605eec54dca7b45c8924edaa9f48a9ab5e5cfad269c98a7861dc4';
        dataForm += '&fee=' + 0.0075;

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


});