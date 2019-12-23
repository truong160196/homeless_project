
var run_waitMe = window.run_waitMe;
var addProductToCart;
var listProduct = [];

(function ($) {
    // Khai báo mảng lưu sản phẩm giỏ hàng.
    "use strict";

    $(document).ready(function() {
        loadListProduct();
    });

    var loadListProduct = () => {
        run_waitMe('.shop-panel');

        var url = base_ajax + '/store/product/list';

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                document.getElementById('shop_grids').innerHTML = response;
                run_waitMe('.shop-panel', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
                run_waitMe('.shop-panel', true);
            }
        });
    };

    $(document).on('click', '#btn_search', function(e) {
        e.preventDefault();
        searchProduct()
    });

    var searchProduct = function () {
        run_waitMe('.shop-panel');
        const keyword = $('#keyword').val();

        var url = base_ajax + '/store/product/search?keyword=' + keyword;

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                document.getElementById('shop_grids').innerHTML = response;
                run_waitMe('.shop-panel', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
                run_waitMe('.shop-panel', true);
            }
        });
    }

    var loadProductCart = function () {
        var clone = document.getElementById("clone");
        document.getElementById("list_product").innerHTML = '';

        var total = 0;
        var tax = 0;
        var total_payment = 0;

        listProduct.forEach(function (item) {
            var itemClone = clone.cloneNode(true);
            itemClone.style.display = 'inline-flex';
            itemClone.setAttribute('id', 'close_' + item.id);

            itemClone.getElementsByClassName('price_text')[0].innerText = 'x $' + item.price;
            itemClone.getElementsByClassName('total_text')[0].innerText = '$' + item.price * item.qty;
            itemClone.getElementsByClassName('title_product')[0].innerText = item.name;
            itemClone.getElementsByClassName('title_sku')[0].innerText = item.sku;
            itemClone.getElementsByClassName('input-qty')[0].value = item.qty;
            itemClone.getElementsByClassName('btn-remove')[0].setAttribute('data-id', item.id);
            itemClone.getElementsByClassName('input-qty')[0].setAttribute('data-id', item.id);

            total += (item.price * item.qty);
            document.getElementById("list_product").appendChild(itemClone);
        });

        tax = total * 0.1;
        total_payment = total + tax;

        document.getElementById("total").innerText = blockchain.formatCurrency(total, 2);
        document.getElementById("tax").innerText = blockchain.formatCurrency(tax, 2);
        document.getElementById("total_payment").innerText = blockchain.formatCurrency(total_payment, 2);
    };
    
    addProductToCart = function (id, price, name, sku) {
        const obiIndex = listProduct.findIndex(obj => obj.id === id);

        if (obiIndex > -1) {
            listProduct[obiIndex].qty += 1;
        } else {
            listProduct.push({
                id: id,
                name: name,
                sku: sku,
                price: price,
                qty: 1
            });
        }

        loadProductCart();
    };

    $(document).on('click', '.btn-remove', function (e) {
        const id = $(this).attr('data-id');

        listProduct = listProduct.filter(x => x.id !== id)
        loadProductCart();
    });

    $(document).on('change', '.input-qty', function (e) {
        const id = $(this).attr('data-id');
        const value = $(this).val();

        const obiIndex = listProduct.findIndex(obj => obj.id === id);

        if (obiIndex > -1) {
            listProduct[obiIndex].qty = value;
        }

        loadProductCart();
    });

    $(document).on('click', '#submit_payment', function(e) {
        e.preventDefault();
        submitPayment()
    });

    var submitPayment = function () {
        run_waitMe('.shop-pg-section');

        var url = base_ajax + '/store/order/create';
        var dataForm = new FormData();

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
                run_waitMe('.shop-pg-section', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
                run_waitMe('.shop-pg-section', true);
            }
        });
    }
})(jQuery);
