
var run_waitMe = window.run_waitMe;
var addProductToCart;
var listProduct = [];
var qrcode;

(function ($) {
    // Khai báo mảng lưu sản phẩm giỏ hàng.
    "use strict";
    var total = 0;
    var tax = 0;
    var total_payment = 0;

    $(document).ready(function() {
        loadListProduct();
        qrcode = new QRCode("qrcode", {
            width: 250,
            height: 250,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
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

    $(document).on('keyup', '#keyword', function(e) {
        e.preventDefault();
        if (e.keyCode === 13) {
            searchProduct()
        }
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

        document.getElementById("total").innerText = '$' + blockchain.formatCurrency(total, 2);
        document.getElementById("tax").innerText = '$' +  blockchain.formatCurrency(tax, 2);
        document.getElementById("total_payment").innerText = '$' + blockchain.formatCurrency(total_payment, 2);
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

        const objIndex = listProduct.find(x => x.id === id);

        listProduct = listProduct.filter(x => x.id !== id);

        if (objIndex > -1) {
            total = total - (objIndex.qty * objIndex.price);
        }

        total = 0;
        total_payment = 0;
        tax = 0;
        
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
        // run_waitMe('.shop-pg-section');
                var url = base_ajax + '/store/order/create';
        var dataForm = new FormData();
        dataForm.append('total', total_payment);
        dataForm.append('tax', tax);
        dataForm.append('hash', '0xaC8832ae0C56f638bC07822f90b24A4f8d721B2D');
        dataForm.append('address', '0xaC8832ae0C56f638bC07822f90b24A4f8d721B2D');
        dataForm.append('data', JSON.stringify(listProduct));
        // for(let i = 0; i < listProduct.length; i++) {
        //     dataForm.append('id['+ (listProduct[i].id) +']', listProduct[i].id);
        // }

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.code === 200) {
                    var qrcodeElement = document.getElementById('over_qrcode');
                    var hiden_qrcodeElement = document.getElementById('hiden_qrcode');

                    if (qrcodeElement) {
                        qrcodeElement.style.display = 'block';
                        hiden_qrcodeElement.style.display = 'block';

                        qrcode.clear();

                        const dataQr = {
                            address: '0xaC8832ae0C56f638bC07822f90b24A4f8d721B2D',
                            total: total_payment,
                            payment: true,
                        };

                        qrcode.makeCode(JSON.stringify(dataQr));
                    }
                    // listProduct = [];
                    // total_payment = 0;
                    // tax = 0;
                    // total = 0;
                    // loadProductCart();
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

    $(document).on('click', '#close_qrcode', function (e) {
        var qrcodeElement = document.getElementById('over_qrcode');
        var hiden_qrcodeElement = document.getElementById('hiden_qrcode');

        if (qrcodeElement) {
            qrcodeElement.style.display = 'none';
            hiden_qrcodeElement.style.display = 'none';

            qrcode.clear();
        }
    });
})(jQuery);
