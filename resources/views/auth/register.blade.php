@extends('layouts.userlayout')

@section('content')
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="reg-form">
@csrf
    <div>
        <h2>User Registration</h2>
        @if($errors->any())
        <span class="red" role="alert">
            <strong>{{ $errors->first() }}</strong>
        </span>
        @endif
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">
            </div>
            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
            <input type="file" name="profile_image" id="">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="county" type="text" class="form-control @error('county') is-invalid @enderror" name="county" value="{{ old('county') }}" required autocomplete="county" autofocus placeholder="County">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus placeholder="Age">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus placeholder="Phone Number">
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
        <div class="mb">
            <div class="col-md-6 offset-md-4">
                <p>Already have an account?</p>
                <a href="/login">Sign In</a>
            </div>
        </div>
    </div>
</form>
@endsection


