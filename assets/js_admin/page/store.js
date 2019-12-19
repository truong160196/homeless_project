
(function ($) {
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
                            "<li><a href='#'><i class='ti-shopping-cart'></i></a></li>"+
                            "</ul>"+
                            "</div>"+
                            "</div>"+
                            "<div class='details'>"+
                            "<h4><a href='#'>"+item.product_name+"</a></h4>"+
                            "<span class='price'>"+item.product_price.toLocaleString('en-US', { style: 'currency', currency: 'USD' })+"</span>"+
                            "</div> "+
                        "</div>";
            }
            $("#shop-grids").html(html);
        },
        error: function(error) {
            console.log(error);
        }
    });
})(jQuery);