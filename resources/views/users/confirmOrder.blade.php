@extends ('layouts.userlayout')
@section('content')
<div class="confirm-order">
    <form action="{{route('lipaNaMpesa')}}" method="POST">
        @csrf
        <div class="final-info">
            <h2>Confirm Your Info</h2>
            <p>please provide your mpesa number</p>
            <div class="info" id="first">
                <span>Name</span>
                <input type="text" required name="name" id="" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
            </div>
            <div class="info">
                <span>Address</span>
                <input type="text" required name="address" id="" value="{{ Auth::user()->address }}">
            </div>
            <div class="info">
                <span>Phone Number</span>
                <input type="hidden" name="amount" value="{{$orderTotal}}" />
                <input type="text" required name="phone" id="" value="{{ Auth::user()->phone_number }}">
            </div>
        </div>
        <table class="order">
            <h2>Confirm Order</h2>
            <p>Total Items {{ count($items) }}</p>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $items as $item )
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->totalPrice}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="totals">
            <span>Total</span>
            <span>KSH {{$orderTotal}}</span>
        </div>
        <button type="submit">Order Now</button>
    </form>
</div>
@endsection