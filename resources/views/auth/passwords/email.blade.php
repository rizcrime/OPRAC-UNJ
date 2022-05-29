@extends('layouts.app')

@section('content')
<div class="form-gap" style="padding-top: 70px;"></div>
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-envelope color-blue"></i>
                                                </span>
                                                <input id="email" placeholder="email address" class="form-control"
                                                    type="email" name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus
                                                    oninvalid="setCustomValidity('Please enter a valid email address!')"
                                                    onchange="try{setCustomValidity('')}catch(e){}" required="">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
