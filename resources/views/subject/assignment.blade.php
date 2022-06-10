@extends('layouts.app')
@section('content')
<div class="container-fluid flex-wrap">
    <div class="row justify-content-center">
        @foreach ($allData as $ad)
        @foreach($isMember as $iM)
        @if($iM == Auth::id())
        @php($date_facturation = \Carbon\Carbon::parse($ad->due))
        @if (!$date_facturation->isPast())
        <div class="card text-center" style="margin: 2%">
            <div class="card-header text-light bg-dark">
                <strong>Ditugaskan pada</strong> {{ date('l, d-F-Y H:m', strtotime($ad->created_at)) }}
            </div>
            <div class="card-body bg-warning">
                <p name="assignment" id="assignment" hidden>{{ $ad->subjects->id }}</p>
                <h5 class="card-title"><strong>Subject</strong> : {{ $ad->subjects->title }}</h5>
                <h5 class="card-title"><strong>Judul</strong> : {{ $ad->title }}</h5>
                <p class="card-text"><strong>Catatan</strong> : {{ $ad->subjects->description }}</p>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            @if($authRole->roleName=='dosen')
                            <a href="assignment/{{ $ad->id }}" class="btn btn-danger justify-content-center">Delete</a>
                            @elseif($authRole->roleName=='mahasiswa')
                            <a href="#signupModal{{$ad->id}}" data-toggle="modal" class="btn btn-success justify-content-center">Assign</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted bg-dark">
                <div class="btn btn-warning">
                    <strong class="text-danger">Deadline {{ date('l, d-F-Y H:m', strtotime($ad->due)) }}</strong>
                </div>
            </div>
        </div>
        <!-- Modal Assignment -->
        <div class="modal fade" id="signupModal{{$ad->id}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal root -->
                    <div class="m-header">
                        <button style="font-size: 50px" class="close" data-dismiss="modal">
                            ×
                        </button>
                        <h2 class="myModalLabel">Upload Tugas</h2>
                    </div>
                    <!-- Modal body -->
                    <div class="inputs">
                        <form method="POST" action="{{ route('assign.collect') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Tugas") }}</label>
                                <div class="col-md-6">
                                    <input value="{{$ad->title}}" class="form-control" readonly disabled />
                                    <input type="hidden" id="assignment" name="assignment" class="form-control" value="{{ $ad->id }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Dari Subject") }}</label>
                                <div class="col-md-6">
                                    <input value="{{$ad->subjects->title}}" id="rm" name="rm" class="form-control" readonly disabled />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="formFile" class="col-md-4 col-form-label text-md-end">File Tugas</label>
                                <div class="col-md-6">
                                    <input type="file" onchange="validateSize(this, 1024)" accept="application/pdf" id="file" name="file" class="file">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Note") }}</label>
                                <div class="col-md-6">
                                    <input id="description" name="description" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Pengumpul Tugas") }}</label>
                                <div class="col-md-6">
                                    <input value="{{Auth::User()->name}}" id="rm" name="rm" class="form-control" readonly disabled />
                                    <input type="hidden" id="rm" name="rm" class="form-control" value="{{ Auth::user()->name }}" />
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Submit") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach
        @endforeach
    </div>
</div>
@endsection