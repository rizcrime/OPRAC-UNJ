@extends('layouts.app')

@section('content')
<div class="bkg-form">
    <h3 class="judul">{{ __('Login') }}</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label class="form-judul" for="email">{{
            __('Email Address') }}</label class="form-judul">

        <input class="col-sm-12" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>

        <label class="form-judul" for="password">{{
            __('Password') }}</label class="form-judul">

        <input class="col-sm-12" id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br><br>

        <button type="submit" class="ipt-data">
            {{ __('Login') }}
        </button>
    </form>
</div>

<div id="div-support">
    <input class="support" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label for="remember">
        {{ __('Remember Me') }}
    </label>
    <p class="support"> | </p>
    @if (Route::has('password.request'))
    <a class="support" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
    @endif
</div>
@endsection