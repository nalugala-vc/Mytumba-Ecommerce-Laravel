@extends('layouts.userlayout')

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
<form method="POST" action="{{ route('password.confirm') }}" id="reg-form">

@csrf
    <div>
    <h2>Confirm Password</h2>
    @if($errors->any())
    <span class="red" role="alert">
        <strong>{{ $errors->first() }}</strong>
    </span>
    @endif
    <span><p>Please confirm your password before continuing</p></span>
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
    <div class="col-md-6 offset-md-4">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Confirm Password
            </button>
        </div>
    </div>
    </div>
</form>

@endsection
