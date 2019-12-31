@foreach($products as $product)
<div class="grid">
    <div class="img-cart">
        <div class="img-holder">
            <img src="{{asset($product->product_image)}}" alt>
        </div>
    </div>
    <div class="details">
        <h4>{{$product->product_name}}</h4>
        <p>{{$product->product_sku}}</p>
        <button
            class="btn btn-warning price"
            onclick="addProductToCart(
            '{{$product->id}}',
            '{{$product->product_price}}',
            '{{$product->product_name}}',
            '{{$product->product_sku}}'
            )"
        >
            ${{$product->product_price}}
        </button>
    </div>
</div>
@endforeach
