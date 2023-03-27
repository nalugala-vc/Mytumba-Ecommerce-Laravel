@extends('layouts.adminLayout')
@section ('head-title')
<div class="left">
    <h1>Edit Existing Product</h1>
    <ul class="breadcrumb">
        <li>
            <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
            <a class="active" href="#">Home</a>
        </li>
    </ul>
</div>
@endsection
@section ('content')
<form id="editUser">
    <div class="edit-user">
        <div class="input-div">
            <div class="label">
                <BiUserPlus class="icon"/>
                <span>First Name</span>
            </div>
            <input 
                type="text"
                name="firstName"
                autoComplete="off"
                value={firstName}
                onChange={onFirstNameChanged}
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiUserCheck class="icon"/>
                <span>Last Name</span>
            </div>
            <input 
                type="text"
                name="lastName"
                autoComplete="off"
                value={lastName}
                onChange={onLastNameChanged}
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
                value={email}
                onChange={onEmailChanged}
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
                value={password}
                onChange={onPasswordChanged}
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
                value={passwordConfirmation}
                onChange={onPasswordConfirmationChanged}
                onMouseLeave={isPasswordMatch}
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiImageAdd class="icon"/>
                <span>Image</span>
            </div>
            <input 
                type="file"
                name="profilePicture"
                onChange={onProfilePictureChanged}
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BsFillPhoneVibrateFill class="icon"/>
                <span>Phone Number</span>
            </div>
            <input 
                type="text"
                name="phoneNumber"
                autoComplete="off"
                value={phoneNumber}
                onChange={onPhoneNumberChanged}
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
                value={address}
                onChange={onAddressChanged}
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
                value={county}
                onChange={onCountyChanged}
            />
        </div>
    </div>
    <button 
        type="button" 
        class="submit-btn" 
        onClick={onSaveUserClicked}
        >Add User</button>
    </form>
@endsection