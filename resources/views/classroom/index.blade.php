@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center; margin: 2%;">
        @foreach($classroom as $item)
        <div class="col-sm-6 card" style="width: 18rem; margin: 2%;">
            <img src="{{ asset('media/logo-google-meet.png') }}" class="card-img-top">
            <div class="card-body">
                <a class="card-text" href="{{ $item->link }}">{{ $item->lesson }}</a>
            </div>
        </div>
        @endforeach
        @if($authRole != 'mahasiswa')
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
                <button style="font-size: 50px" class="close" data-dismiss="modal">×</button>
                <h2 class="myModalLabel"> Tambah Virtual Kelas </h2>
            </div>
            <!-- Modal body -->
            <div class="inputs">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Room Master') }}</label>
                        <div class="col-md-6">
                            <input value="{{Auth::User()->name}}" id="name" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Dosen') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="role" id="role">
                                @foreach ($allDosen as $allDosen)
                                <option value="{{$allDosen->code}}">{{$allDosen->userName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Pengawas') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="role" id="role">
                                @foreach ($allPengawas as $allPengawas)
                                <option value="{{$allPengawas->code}}">{{$allPengawas->userName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Pelajaran') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="role" id="role">
                                @foreach ($classroom as $classroom)
                                <option value="{{$classroom->code}}">{{$classroom->lesson}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Generate Kelas') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
