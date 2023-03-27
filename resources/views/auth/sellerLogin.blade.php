@extends('layouts.userForms')

@section('content')
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="reg-form">
@csrf
    <div>
    <h2>Seller Login</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="mb-0" id="rem">
        <div class="col-md-6 offset-md-4" id="rem">
            <input type="checkbox" name="" id="check">
            <p>Remember me?</p>
        </div>
        <div class="col-md-6 offset-md-4">
            <a href="">Forgot Password</a>
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
            <a href="">Sign In</a>
        </div>
    </div>
    </div>
</form>
@endsection
