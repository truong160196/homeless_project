

(function ($) {
    "use strict";

    $(document).on('click', '#btn_login', function(e) {
        e.preventDefault();
        $('#form_login').submit();
    });


    $("#form_login").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            loginSubmitForm();
        }
    });

    var loginSubmitForm = function() {
        run_waitMe('.limiter');
        var url = base_ajax + '/utils/login';
        $.ajax({
            url: url,
            type: "POST",
            data: $("#form_login").serialize(),
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });

                    $('#username').val('');
                    $('#password').val('');

                    location.reload();
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
    };



    $(document).on('click', '#btn_register', function(e) {
        e.preventDefault();
        $('#form_register').submit();
    });


    $("#form_register").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            registerSubmitFrom();
        }
    });

    var registerSubmitFrom = function () {
        run_waitMe('.limiter');
        var url = base_ajax + '/utils/register';
        var dataForm = $("#form_register").serialize();

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

                    $('#username').val('');
                    $('#password').val('');
                    $('#confirm_password').val('');

                    location.reload();
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
})(jQuery);