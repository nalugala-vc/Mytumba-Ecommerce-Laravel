@extends('layouts.userlayout')
@section('content')
<section class="cart-holder">
    <div class="cart-items">
        <div class="cart-div"style="padding:0 60px">
        <div class="main-title">
            <div>
                <h1>Shopping cart</h1>
            </div>
            <h1>Items 3</h1>
        </div>
        <div class="titles">
            <h4>PRODUCT DETAILS</h4>
            <h4>QUANTITY</h4>
            <h4>PRICE</h4>
            <h4>TOTAL PRICE</h4>
        </div>
        <div class="cart-item">
            <div class="product-details">
                <div class="prod-container">
                    <div class="img-container">
                        <img src="/assets/ecomm (3).jpg"alt="Zip jacket" />
                    </div>
                    <div class="info">
                        <h3>Cute outfit</h3>
                        <h4 style="color:rgb(37,150,190)">men</h4>
                        <div class="remove-tag">
                            <h5>Remove</h5>
                            <i class="fa-solid fa-trash"></i>
                            <BsTrash class="remove-icon" onClick={()=>{}}/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="quantity">
                <div class="quantity-div">
                    <i class="fa-solid fa-minus" id="quantity-control"></i>
                    <div><p>{itemQuantity}</p></div>
                    <i class="fa-solid fa-plus" id="quantity-control"></i>
                </div>
            </div>
            <div class="price">
                <h4>KSH. 500</h4>
            </div>
            <div class="total">
                <h4>KSH. 500</h4>
            </div>
        </div>
        </div>
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="items">
                <h4>ITEMS 3</h4>
                <h4>KSH. 838.90</h4>
            </div>
            <div class="items">
                <h4>SHIPPING</h4>
                <h4>KSH. 838.90</h4>
            </div>
            <div class="promo-code">
                <h4>PROMO CODE</h4>
                <input type="text" placeholder="Enter your code"/>
                <button>APPLY</button>
            </div>
            <div class="items">
                <h4>TOTAL COST</h4>
                <h4>KSH. 838.90</h4>
            </div>
            <button>CHECKOUT</button>
        </div>
    </div>
</section>
@endsection