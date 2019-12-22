@foreach($products as $product)
<div class="grid">
    <div class="img-cart">
        <div class="img-holder">
            <img src="{{asset($product->product_image)}}" alt>
        </div>
        <div class="cart-details">
            <ul>
                <li><a href="#"><i class="ti-shopping-cart"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="details">
        <h4><a href="#">{{$product->product_name}}</a></h4>
        <span class="price">${{$product->product_price}}</span>
    </div>
</div>
@endforeach
