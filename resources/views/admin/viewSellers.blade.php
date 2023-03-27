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
            <a class="active" href="#">Sellers</a>
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
                <th>User</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>County</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sellers as $user)
            <tr>
                <td>
                <img src="/assets/{{$user->profile_image}}" alt={user.firstName} />

                    <p>{{$user->first_name}}{{$user->last_name}}</p>
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->county}}</td>
                <td>{{$user->address}}</td>
                <td><button class="edit-btn"><a href="{{ route('editSeller', ['seller' => $user->id]) }}">Edit</a></button></td>
                <td>
                    <form action="{{ route('deleteSeller', ['seller' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <h2>No Sellers</h2>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection