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
                placeholder="Confirm Password"
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
                placeholder="Phone Number"
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
            />
        </div>
    </div>
    <button 
        type="submit" 
        class="submit-btn" 
        >Add User</button>
    </form>
@endsection