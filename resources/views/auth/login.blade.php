@extends('layouts.app')
@section('content')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">

<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email"
                                                    class="form-style form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" placeholder="Your Email" id="email"
                                                    required autocomplete="email">
                                                <i class="input-icon bi bi-envelope-fill"></i>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="password"
                                                    class="form-style form-control @error('password') is-invalid @enderror"
                                                    placeholder="Your Password" id="password" required
                                                    autocomplete="current-password">
                                                <i class="input-icon bi bi-lock-fill"></i>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn mt-4">{{ __('Login') }}</button>
                                            <p class="mb-0 mt-4 text-center">
                                                @if (Route::has('password.request'))
                                                <a class="link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                                @endif
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="name" required autocomplete="name"
                                                    placeholder="{{ __('Name') }}" id="name" value="{{ old('name') }}"
                                                    class="form-style form-control @error('name') is-invalid @enderror">
                                                <i class="input-icon bi bi-person-badge"></i>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="email" name="email" placeholder="{{ __('Email') }}"
                                                    id="email" value="{{ old('email') }}" required autocomplete="email"
                                                    class="form-style form-control @error('email') is-invalid @enderror">
                                                <i class="input-icon bi bi-envelope-fill"></i>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="password"
                                                    placeholder="{{ __('Password') }}" id="password" required
                                                    autocomplete="new-password"
                                                    class="form-style @error('password') is-invalid @enderror">
                                                <i class="input-icon bi bi-lock-fill"></i>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="password_confirmation" class="form-style"
                                                    placeholder="{{ __('Confirm Password') }}" id="password-confirm"
                                                    required autocomplete="new-password">
                                                <i class="input-icon bi bi-shield-lock-fill"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <select class="form-style" name="role" id="role">
                                                    <option style="display:none">{{ __('Select Role') }}</option>
                                                    @foreach ($role = DB::table('roles')->get() as $role )
                                                    <option value="{{$role->code}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i class="input-icon bi bi-info-circle-fill"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4">{{ __('Register') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
