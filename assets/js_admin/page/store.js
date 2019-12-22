
(function ($) {
    // Khai báo mảng lưu sản phẩm giỏ hàng.
    "use strict";

    $(document).ready(function() {
        loadListProduct();
    });

    var loadListProduct = () => {
        var url = base_ajax + '/store/home';

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                document.getElementById('shop_grids').innerHTML = response;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
            }
        });
    }

})(jQuery);
