@extends('layouts.adminLayout')
@section ('head-title')
<div class="left">
    <h1>Add New User</h1>
    <ul class="breadcrumb">
        <li>
            <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
            <a class="active" href="#">Seller</a>
        </li>
    </ul>
</div>
@endsection
@section ('content')
<form id="editUser" method="POST" action="{{ route('registerSeller') }}" enctype="multipart/form-data">
    @csrf
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
                placeholder="First Name"
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
                placeholder="Last Name"
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
                placeholder="Email"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <MdLocationOn class="icon"/>
                <span>Age</span>
            </div>
            <input 
                type="number"
                name="age"
                autoComplete="off"
                placeholder="Age"
                required
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
                placeholder="Password"
                required
            />
        </div>
        <div class="input-div">
            <div class="label">
                <RiLockPasswordLine class="icon"/>
                <span>Confirm Password</span>
            </div>
            <input 
                type="password"
                name="password_confirmation"
                autoComplete="off"
                placeholder="Confirm Password"
                required
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
                required
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
                placeholder="Phone Number"
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
                placeholder="Address"
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
                placeholder="County"
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
        type="submit" 
        class="submit-btn" 
        >Add User</button>
    </form>
@endsection