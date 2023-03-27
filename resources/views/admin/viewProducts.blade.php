@extends('layouts.adminLayout')
@section('head-title')
<div class="left">
    <h1>Dashboard</h1>
    <ul class="breadcrumb">
        <li>
            <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
            <a class="active" href="#">Products</a>
        </li>
    </ul>
</div>
<a href="#" class="btn-download">
    <i class='bx bxs-cloud-download' ></i>
    <span class="text">Download PDF</span>
</a>
@endsection
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
<div class="table-data">
    <div class="order">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Sub-Category</th>
                <th>Price</th>
                <th>Shipping</th>
                <th>quantity</th>
                <th>Edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>
                <img src="/assets/{{$product->profile_image}}" alt={product.firstName} />

                    <p>{{$product->name}}</p>
                </td>
                <td>{{$product->category}}</td>
                <td>{{$product->sub_category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->shipping}}</td>
                <td>{{$product->quantity}}</td>
                <td><button class="edit-btn"><a href="{{ route('editSeller', ['seller' => $product->id]) }}">Edit</a></button></td>
                <td>
                    <form action="{{ route('deleteSeller', ['seller' => $product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <h2>No Products</h2>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection