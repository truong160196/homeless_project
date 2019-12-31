<table class="table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->product_name}}</td>
                <td>>{{$order->quantity}}</td>
                <td>>{{$order->price}}</td>
            </tr>
         @endforeach
    </tbody>
</table>