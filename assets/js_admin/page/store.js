
(function ($) {
    // Khai báo mảng lưu sản phẩm giỏ hàng.
    var orderDataList = [];
    "use strict";
    $.ajax({
        type:"get",
        url:"/api/store/home",
        success: function(data) {
            var html = "";
            for(var item of data) {
                html += "<div class='grid'>"+
                            "<div class='img-cart'>"+
                            "<div class='img-holder'>"+
                            "<img src='"+item.product_image+"' alt>"+
                            "</div>"+
                            "<div class='cart-details'>"+
                            "<ul>"+
                            "<li id='ti-shopping-cart' data-id='" + item.id + "'><a data-id='" + item.id + "'><i data-id='" + item.id + "' class='ti-shopping-cart' ></i></a></li>"+
                            "</ul>"+
                            "</div>"+
                            "</div>"+
                            "<div class='details'>"+
                            "<h4><a href='#' class='name'>"+item.product_name+"</a></h4>"+
                            "<span class='price' data-price='"+item.product_price +"'>"+item.product_price.toLocaleString('en-US', { style: 'currency', currency: 'USD' })+"</span>"+
                            "</div> "+
                        "</div>";
            }
            $("#shop-grids").html(html);

            $("#shop-grids ul li a").on('click', function(e) {
                var id = e.currentTarget.dataset.id;
                var $parent = $(e.currentTarget).closest(".grid");
                var name = $parent.find(".name").text();
                var price = $parent.find(".price").data().price;
                // Khi click thì mình push vào mảng này

                var obj = {
                    id: id,
                    quantity: 1,
                    product_name: name,
                    price: price
                }

                // Kiem tra neu ton tai
                var a = orderDataList.find(x=>x.id===id);
                if(a) {
                    a.quantity = a.quantity + 1
                } else {
                    // ko ton tai thì push vào
                    orderDataList.push(obj);
                }
                // Kiểm tra mã sp, nếu trùng thì mình tăng số lượng lên 1.
                
                // Rồi tìm cái layout bên trái for cái list này xong render data ra là dc
                var htmlLeft="";
                var i=1;
                for(var itemLeft of orderDataList){
                    htmlLeft+= "<tr class='striped'>"+
                                "<th scope='row' class='id' data-id='"+itemLeft.id+"'>"+(i++)+"</th>"+
                                 "<td>"+itemLeft.product_name+"</td>"+
                             "<td>"+
                             "<input type='number' id='quantity' class='form-control' value='"+itemLeft.quantity+"' />"+
                            "</td>"+
                             "<td class='price1' data-price='"+itemLeft.price+"'>"+(parseFloat(itemLeft.price)*parseFloat(itemLeft.quantity)).toLocaleString('en-US', { style: 'currency', currency: 'USD' })+"</td>"+
                             "<td>"+
                             "<button type='button' class='btn btn-danger'>Remove</button>"+
                            "</td>"+
                            "</tr>";
                }
                $("#table-striped-left").html(htmlLeft);
                $("#table-striped-left td input").blur(function(e){
                    var quantity=e.currentTarget.value;
                    var $parent=$(e.currentTarget).closest(".striped");
                    var id = $parent.find(".id").data().id.toLocaleString();
                    var price = $parent.find(".price1").data().price;
                    var a = orderDataList.find(x=>x.id===id);
                    if(a){
                        a.quantity=quantity;
                        $parent.find(".price1").text((parseFloat(quantity)*parseFloat(price)).toLocaleString('en-US', { style: 'currency', currency: 'USD' }));
                    }
                  });
                console.log(orderDataList);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
})(jQuery);
