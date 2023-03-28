@extends('layouts.adminLayout')
@section ('head-title')
<div class="left">
    <h1>Edit Seller</h1>
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
@endsection
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
@section ('content')
<form id="editUser" action="{{ route('updateSeller', ['seller' => $seller->id]) }}" enctype="multipart/form-data" method="POST">
@csrf
@method('PUT')
@if($errors->any())
        <span class="red" role="alert">
            <strong>{{ $errors->first() }}</strong>
        </span>
    @endif
    <div class="edit-user">
        <div class="input-div">
            <div class="label">
                <BiUserPlus class="icon"/>
                <span>First Name</span>
            </div>
            <input 
                type="text"
                name="first_name"
                autoComplete="off"
                value="{{$seller->first_name}}"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiUserCheck class="icon"/>
                <span>Last Name</span>
            </div>
            <input 
                type="text"
                name="last_name"
                autoComplete="off"
                value="{{$seller->last_name}}"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiMailSend class="icon"/>
                <span>Email</span>
            </div>
            <input 
                type="email"
                name="email"
                autoComplete="off"
                value="{{$seller->email}}"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiMailSend class="icon"/>
                <span>Age</span>
            </div>
            <input 
                type="number"
                name="age"
                autoComplete="off"
                value="{{$seller->age}}"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <RiLockPasswordFill class="icon"/>
                <span>Password</span>
            </div>
            <input 
                type="password"
                name="password"
                autoComplete="off"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <RiLockPasswordLine class="icon"/>
                <span>Confirm Password</span>
            </div>
            <input 
                type="password"
                name="confirmPassword"
                autoComplete="off"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiImageAdd class="icon"/>
                <span>Image</span>
            </div>
            <input 
                type="file"
                name="profile_image"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BsFillPhoneVibrateFill class="icon"/>
                <span>Phone Number</span>
            </div>
            <input 
                type="text"
                name="phone_number"
                autoComplete="off"
                value="{{$seller->phone_number}}"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <FaRegAddressCard class="icon"/>
                <span>Address</span>
            </div>
            <input 
                type="text"
                name="address"
                autoComplete="off"
                value="{{$seller->address}}"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <MdLocationOn class="icon"/>
                <span>County</span>
            </div>
            <input 
                type="text"
                name="county"
                autoComplete="off"
                value="{{$seller->county}}"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <MdLocationOn class="icon"/>
                <span>Store Name</span>
            </div>
            <input 
                type="text"
                name="store_name"
                autoComplete="off"
                value="{{$seller->store_name}}"
                placeholder="Store Name"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiImageAdd class="icon"/>
                <span>Store Picture</span>
            </div>
            <input 
                type="file"
                name="store_picture"
                required
            />
        </div>
    </div>
    <button 
        class="submit-btn" 
        >Edit Seller</button>
    </form>
@endsection