
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
        $.ajax({
            url: '/api/utils/login',
            type: "POST",
            data: $("#form_login").serialize(),
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });
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