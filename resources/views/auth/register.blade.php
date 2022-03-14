@extends('layouts.app')

@section('content')
<div class="bkg-form">
    <h3 class="judul">{{ __('Register') }}</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label class="form-judul" for="name">{{ __('Nama Lengkap') }}</label>
        <input class="col-sm-12 login" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>

        <label class="form-judul" for="email">{{ __('Email') }}</label>
        <input class="col-sm-12 login" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
            name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>

        <label class="form-judul" for="password">{{ __('Password') }}</label>
        <input class="col-sm-12 login" id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>

        <label class="form-judul" for="password-confirm">{{ __('Konfirmasi Password') }}</label>
        <input class="col-sm-12 login" id="password-confirm" type="password" class="form-control" name="password_confirmation"
            required autocomplete="new-password">
        <br>

        <div class="form-group">
            <label class="form-judul" for="role">Division:</label>
            <select name="role" id="role">
                <option value="dosen">Dosen</option>
                <option value="pendamping">Pendamping</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
        </div>
        <br>

        <button type="submit" class="ipt-data">
            {{ __('Register') }}
        </button>
    </form>
</div>
@endsection