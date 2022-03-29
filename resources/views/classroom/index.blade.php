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
                <a class="card-text" href="#modal" data-toggle="modal">Tambah Kelas</a>
            </div>
        </div>
        @endif
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

                    <!-- username input -->
                    <div class="form-group input-group">
                        <label for="username" class="sr-only">
                            Username
                        </label>
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>

                    <!-- Email input -->
                    <div class="form-group input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <label for="email" class="sr-only">
                            Email
                        </label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address">
                    </div>

                    <!-- Password -->
                    <div class="form-group input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <label for="password" class="sr-only">
                            Password
                        </label>
                        <input type="password" class="form-control" id="password" placeholder="Choose a password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <label for="password2" class="sr-only">
                            Confirm Password
                        </label>
                        <input type="password" class="form-control" id="password2" placeholder="Confirm password">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="footer">
                    <button type="submit">Sign Up</button>
                    <p>
                        Already have an account?!
                        <a href="#loginModal" data-toggle="modal" data-dismiss="modal">
                            Login!
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
