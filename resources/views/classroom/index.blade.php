@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center; margin: 2%;">
        @foreach($data as $item)
        <div class="col-sm-6 card" style="width: 18rem; margin: 2%;">
            <img src="{{ asset('media/logo-google-meet.png') }}" class="card-img-top">
            <div class="card-body">
                <a class="card-text" href="{{ $item->link }}">{{ $item->users_name }}</a>
            </div>
        </div>
        @endforeach
        @if(Auth::user()->role != 'Mahasiswa')
        <div id="create-class" class="col-sm-6 card" style="width: 18rem; margin: 2%;">
            <img src="{{ asset('media/add.png') }}" class="card-img-top">
            <div class="card-body">
                <a href="#signupModal" data-toggle="modal">Tambah Kelas</a>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal root -->
            <div class="m-header">
                <button class="close" data-dismiss="modal">
                    ×
                </button>
                <h2 class="myModalLabel"> Sign Up </h2>
            </div>

            <!-- Modal body -->
            <div class="inputs">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                            }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                            }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                            Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="role">{{ __('Division') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="role" id="role">
                                <option value="dosen">Dosen</option>
                                <option value="pendamping">Pendamping</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

        </div>
    </div>
</div>
@endsection
