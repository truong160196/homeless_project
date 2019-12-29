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
        $('#balanceDonate').addClass('loading');
        $('#balanceDonate').text('');
        setTimeout((function () {
            initLoadDataBlockchain();

            $('#balanceDonate').removeClass('loading');

            blockchain.subscriptionLog(function (data) {
                initLoadDataBlockchain();
            })
        }), 1800);
    });

    var initLoadDataBlockchain = function () {
        loadBalanceDonate();
        loadAddress();
    };


    loadBalanceDonate = async function () {
        const balanceDonate = await blockchain.getBalanceDonate();
        if (balanceDonate) {
            $('#balanceDonate').text('Balance: ' + balanceDonate + ' USD');
        } else {
            $('#balanceDonate').text('Balance: 0 USD');
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

    $(document).on('click', '#btn_donate', function(e) {
        e.preventDefault();
        $('#form_donate').submit();
    });


    $("#form_donate").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            sendTransactionDonate();
        }
    });


    var sendTransactionDonate = async function () {
        run_waitMe('.page-wrapper');
        var url = base_ajax + '/user/donate/send';
        var dataForm = $("#form_donate").serialize();

        const id = $('#id_user').val();
        const address = $('#homeless_wallet').val();
        const amount = $('#amount').val();

        const result = await blockchain.sendTransactionDonate(address, amount);
        if (result.status === true && result.message) {

            dataForm += '&id=' + id;
            dataForm += '&hash=' + result.message;
            dataForm += '&fee=' + 0.0075;
            dataForm += '&token=USD' ;

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

                        $('#amount').val('')
                        window.location.reload();
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
    }

});