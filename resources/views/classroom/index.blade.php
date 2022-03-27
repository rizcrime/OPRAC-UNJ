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
                    <a class="card-text" href="#">Tambah Kelas</a>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
