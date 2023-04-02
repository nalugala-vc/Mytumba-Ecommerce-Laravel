@extends('layouts.cartLayout')
@section('content')
@if (session('success'))
<div
    class="cart-popup-success"
    >
    {{ session('success') }}
    </div>
@endif
@if (session('error'))
<div
    class="cart-popup-error"
    >
    {{ session('error') }}
    </div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="cart-holder">
    <div class="cart-items">
        <div class="cart-div"style="padding:0 60px">
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
                            <div><p id="quantity-{{$cartItem->id}}">1</p></div>
                            <button type="button" id="add-{{$cartItem->id}}"><i class="fa-solid fa-plus" class="quantity-control"></i></button>
                        </div>
                    </td>
                    <td>
                        <div class="price">
                            <h4 id="price-{{$cartItem->id}}">{{$cartItem->product->price}}</h4>
                        </div>
                    </td>
                    <td>
                        <div class="total">
                            <h4 id="total-{{$cartItem->id}}"> {{$cartItem->product->price}}</h4>
                        </div>
                    </td>
                </tr>
            @empty
                <h2>No items in cart</h2>
            @endforelse

        </table>
        </div>
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="items">
                <h4>ITEMS  {{$cartItem->count()}}</h4>
                <h4>KSH. <p id="order-subtotal">838.90</p></h4>
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
    </div>
</section>
<script>
    const cartItems = @json($cartItems);
    const numberOfItems = <?php echo count($cartItems); ?>;
    let itemData = cartItems.map(item => ({ id: item.id, quantity: 1 ,name:item.product.name,totalPrice: item.product.price}));

    var orderTotal = 0;

cartItems.forEach(item => {
    const removeItems = document.getElementById(`subtract-${item.id}`);
    const addItems = document.getElementById(`add-${item.id}`);
    const quantityElement = document.getElementById(`quantity-${item.id}`);
    const priceElement = parseFloat(item.product.price); // convert to number
    const totalElement = document.getElementById(`total-${item.id}`);
    
    // Add the price of the current item to the order total
    orderTotal += priceElement * parseInt(quantityElement.innerText);

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
        totalElement.innerText = 'KSH. ' + total;

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

        console.log('itemData',itemData)
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
        totalElement.innerText = 'KSH. ' + total;

        // Add the new total for this item
        orderTotal += parseFloat(total);

        // Update the quantity in the itemData array
        const itemIndex = itemData.findIndex(i => i.name === item.name);
            if (itemIndex !== -1) {
                itemData[itemIndex].quantity = quantity;
                itemData[itemIndex].totalPrice = total;
            }
        
        // Update the order total
        updateOrderTotal();

        console.log('itemData',itemData);
    });

});

// Display the order total in a paragraph tag
const orderTotalElement = document.getElementById('order-total');
orderTotalElement.innerText = 'KSH. ' + orderTotal.toFixed(2);

function updateOrderTotal() {
    // Update the order total
    const orderTotalElement = document.getElementById('order-total');
    orderTotalElement.innerText = 'KSH. ' + orderTotal.toFixed(2);
}

const checkoutElement = document.getElementById('checkout');

checkoutElement.addEventListener('click',function(event) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log(csrfToken);
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
    console.log(response);
})
.catch(error => {
    // Handle any errors that occur
    console.error(error.message);
});
});

</script>

@endsection