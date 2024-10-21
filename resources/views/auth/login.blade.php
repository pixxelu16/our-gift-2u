@extends('layouts.master')
@section('content')
<div class="login-all-screen">
    <div class="container">
        <div class="login-all-inner">
            @if (session('verified'))
                <div class="alert alert-success">
                    {{ session('verified') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Login</h2>
                <p>Enter your username and password to login.</p>
                <div class="input-login">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-login">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="check-button">
                    <input class="" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember me</label>
                </div>
                <div class="login-button">
                    <button type="submit">Login</button>
                </div>
                <div class="lost-password">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Lost password?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection





