@extends('layouts.userLayout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="cart-holder">
    <div class="cart-items">
        <div class="cart-div">
        <div class="main-title">
            <div>
                <h1>Shopping cart</h1>
            </div>
            <h1>Items {{$cartItems->count()}}</h1>
        </div>
        <table class="cart-table">
            <tr>
                <th>PRODUCT DETAILS</th>
                <th>OUANTITY</th>
                <th>PRICE</th>
                <th>TOTAL PRICE</th>
            </tr>
            @forelse($cartItems as $cartItem)
                @php
                    $image = DB::table('products')->where('id', $cartItem->product_id)->first();
                    $images = explode('|',$image->pictures)
                @endphp
                <tr>
                    <td>
                        <div class="prod-container">
                            <div class="img-container">
                                <img src="/assets/{{$images[0]}}" alt="Zip jacket" />
                            </div>
                            <div class="info">
                                <h3>{{$cartItem->product->name}}</h3>
                                <h4 style="color:rgb(37,150,190)">{{$cartItem->product->categoryP->category_name}}</h4>
                                <form action="{{ route('removeFromCart', ['cartItem' => $cartItem->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="remove-tag">
                                        <h5>Remove</h5>
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="quantity-div">
                            <button type="button" id="subtract-{{$cartItem->id}}"><i class="fa-solid fa-minus" class="quantity-control"></i></button>
                            <div><p id="quantity-{{$cartItem->id}}">{{$cartItem->quantity}}</p></div>
                            <button type="button" id="add-{{$cartItem->id}}"><i class="fa-solid fa-plus" class="quantity-control"></i></button>
                        </div>
                    </td>
                    <td>
                        <div class="price">
                            <h4 id="price-{{$cartItem->id}}">
                                @if($cartItem->product->discount_present == 'true')
                                {{$cartItem->product->discount_price}}
                                @else
                                {{$cartItem->product->price}}
                                @endif
                            </h4>
                        </div>
                    </td>
                    <td>
                        <div class="total">
                            <h4 id="total-{{$cartItem->id}}">
                                @if($cartItem->product->discount_present == 'true')
                                {{$cartItem->product->discount_price * $cartItem->quantity}}
                                @else
                                {{$cartItem->product->price * $cartItem->quantity}}
                                @endif
                            </h4>
                        </div>
                    </td>
                </tr>
            @empty
                <h2>No items in cart</h2>
            @endforelse

        </table>
        </div>
        @if($cartItems)
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="items">
                <h4>ITEMS  {{$cartItems->count()}}</h4>
                <h4>KSH. <p id="order-subtotal"></p></h4>
            </div>
            <div class="items">
                <h4>SHIPPING</h4>
                <h4>KSH. 00</h4>
            </div>
            <div class="promo-code">
                <h4>PROMO CODE</h4>
                <input type="text" placeholder="Enter your code"/>
                <button>APPLY</button>
            </div>
            <div class="items">
                <h4>TOTAL COST</h4>
                <h4>KSH. <p id="order-total"></p></h4>
            </div>
            <button id="checkout">CHECKOUT</button>
        </div>
        @endif
    </div>
</section>
<script>
    const cartItems = @json($cartItems);
    const numberOfItems = <?php echo count($cartItems); ?>;
    let itemData = cartItems.map(item => ({ id: item.id, quantity: 1 ,name:item.product.name,totalPrice: item.product.price}));

    var orderTotal = 0;
    var orderSubtotal = 0;

cartItems.forEach(item => {
    const removeItems = document.getElementById(`subtract-${item.id}`);
    const addItems = document.getElementById(`add-${item.id}`);
    const quantityElement = document.getElementById(`quantity-${item.id}`);
    const priceElement = parseFloat(document.getElementById(`price-${item.id}`).textContent); 

    // convert to number
    const totalElement = document.getElementById(`total-${item.id}`);
    
    // Add the price of the current item to the order total
    orderTotal += priceElement * parseInt(quantityElement.innerText);
    orderSubtotal += priceElement * parseInt(quantityElement.innerText);

    addItems.addEventListener('click', function() {
        var quantity = parseInt(quantityElement.innerText);
        var price = parseFloat(priceElement);

        // Subtract the previous total for this item
        var previousTotal = quantity * price;
        orderTotal -= previousTotal;

        // Increase the quantity by 1
        quantity++;

        // Calculate the new total price
        var total = (quantity * price).toFixed(2);

        // Update the quantity and total elements
        quantityElement.innerText = quantity;
        totalElement.innerText =  total;

        // Add the new total for this item
        orderTotal += parseFloat(total);

         // Update the quantity in the itemData array
        const itemIndex = itemData.findIndex(i => i.id === item.id);
        if (itemIndex !== -1) {
            itemData[itemIndex].quantity = quantity;
            itemData[itemIndex].totalPrice = total;
        }
        
        // Update the order total
        updateOrderTotal();

    });
    
    removeItems.addEventListener('click', function() {
        var quantity = parseInt(quantityElement.innerText);
        var price = parseFloat(priceElement);

        // Subtract the previous total for this item
        var previousTotal = quantity * price;
        orderTotal -= previousTotal;

        // Decrease the quantity by 1, but ensure it doesn't go below 1
        quantity = Math.max(1, quantity - 1);

        // Calculate the new total price
        var total = (quantity * price).toFixed(2);

        // Update the quantity and total elements
        quantityElement.innerText = quantity;
        totalElement.innerText =  total;

        // Add the new total for this item
        orderTotal += parseFloat(total);
        orderSubtotal += parseFloat(total);


        // Update the quantity in the itemData array
        const itemIndex = itemData.findIndex(i => i.name === item.name);
            if (itemIndex !== -1) {
                itemData[itemIndex].quantity = quantity;
                itemData[itemIndex].totalPrice = total;
            }
        
        // Update the order total
        updateOrderTotal();

    });

});

// Display the order total in a paragraph tag
const orderTotalElement = document.getElementById('order-total');
orderTotalElement.innerText = orderTotal.toFixed(2);
const orderSubtotalElement = document.getElementById('order-subtotal');
orderSubtotalElement.innerText = orderTotal.toFixed(2);

function updateOrderTotal() {
    // Update the order total
    const orderTotalElement = document.getElementById('order-total');
    const orderSubtotalElement = document.getElementById('order-subtotal');
    orderTotalElement.innerText =  orderTotal.toFixed(2);
    orderSubtotalElement.innerText =  orderTotal.toFixed(2);
}

const checkoutElement = document.getElementById('checkout');

checkoutElement.addEventListener('click',function(event) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/orderItems', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
    },
    body: JSON.stringify({
        orderTotal: orderTotal,
        items: JSON.stringify(itemData),
    })
})
.then(response => {
    // Handle the response from the server
    if (response.redirected) {
        window.location.href = response.url;
    }
})
.catch(error => {
    // Handle any errors that occur
    console.error(error.message);
});
});

</script>

@endsection