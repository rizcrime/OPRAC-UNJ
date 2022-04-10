@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center; margin: 2%;">
        @foreach($classroom as $item)
        <div class="col-sm-6 card" style="width: 18rem; margin: 2%; padding: 5px;">
            <a href="classroomdelete/{{ $item->id }}"><button onclick="return confirm('yakin?');" class="btn-close" aria-label="Close"></button></a>
            <img style="padding: 5%; width: 70%; height: 70%; margin: auto;"
                src="{{ asset('media/logo-google-meet.png') }}" class="card-img-top">
            <div class="card-body" style="margin-bottom: 20px;">
                <a style="font-weight: 700; font-size: 12px; overflow: hidden;
                            text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-line-clamp: 2; /* number of lines to show */
                            line-clamp: 2;
                            -webkit-box-orient: vertical;" class="card-text" href="{{ $item->link }}">{{
                    $item->classname }}</a>
            </div>
        </div>
        @endforeach
        @if($authRole != 'mahasiswa')
        <div id="create-class" class="col-sm-6 card" style="width: 18rem; margin: 2%;">
            <div class="card-body">
                <a href="#signupModal" data-toggle="modal"><img src="{{ asset('media/add.png') }}" width="100%"
                        height="100%"></a>
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
                <form method="POST" action="{{route('classroom.post')}}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __('Nama Kelas')
                            }}</label>
                        <div class="col-md-6">
                            <input id="classname" name="classname" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Room Master') }}</label>
                        <div class="col-md-6">
                            <input value="{{Auth::User()->name}}" id="rm" name="rm" class="form-control" readonly
                                disabled>
                            <input type="hidden" id="rm" name="rm" class="form-control" value="{{Auth::User()->id}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Dosen') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="dosen" id="dosen">
                                @foreach ($allDosen as $allDosen)
                                <option value="{{$allDosen->idDosen}}">{{$allDosen->userName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Pembimbing') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="pengawas" id="pengawas">
                                @foreach ($allPengawas as $allPengawas)
                                <option value="{{$allPengawas->idPengawas}}">{{$allPengawas->userName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Pelajaran') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="pelajaran" id="pelajaran">
                                @foreach ($lesson as $lesson)
                                <option value="{{$lesson->code}}">{{$lesson->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __('Link Conference')
                            }}</label>
                        <div class="col-md-6">
                            <input id="link" name="link" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __('Mahasiswa') }}</label>
                        <div class="col-md-6">
                            <select required id="student" class="multiselect" name="student[]" multiple="multiple">
                                @foreach ($allMahs as $student)
                                <option value="{{$student->idMhs}}">{{ $student->userName }}</option>
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
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        jQuery("#student").multiselect({
            enableFiltering: true,
        });
    });
</script>
@endsection
