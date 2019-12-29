var run_waitMe = window.run_waitMe;
var addUserToDonate;

$(function() {
    'use strict';

    $(document).ready(function() {
        loadTableUser();
    });

    var loadTableUser = function() {
        run_waitMe('.main-panel');
        var id = $('#donate_id').val();

        var urlTable = base_ajax + '/admin/donate/get/users/' + id;

        $.ajax({
            url: urlTable,
            type: "GET",
            success: function(response) {
                document.getElementById('body_users').innerHTML = response;
                run_waitMe('.main-panel', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
                run_waitMe('.main-panel', true);
            }
        });
    };

    addUserToDonate = function (id) {
        run_waitMe('.main-panel');
        var url = base_ajax + '/admin/donate/add/user/' + id;
        const formElem = document.getElementById('form_add_user_donate');
        var dataForm = new FormData(formElem);

        var donate_id = $('#donate_id').val();

        var accountWallet = blockchain.createAddress();

        dataForm.append('hash', accountWallet.address);
        dataForm.append('donate_id', donate_id);

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            cache       : false,
            contentType : false,
            processData : false,
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });
                    loadTableUser();
                } else {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops',
                        text: response.msg
                    });
                }
                run_waitMe('.main-panel', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
                run_waitMe('.main-panel', true);
            }
        });
    }
});