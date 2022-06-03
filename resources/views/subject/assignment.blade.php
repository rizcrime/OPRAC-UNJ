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
                <h5 class="card-title"><strong>Kelas</strong> : {{ $ad->subjects->title }}</h5>
                <p class="card-text"><strong>Catatan</strong> : {{ $ad->subjects->description }}</p>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            @if($authRole->roleName=='dosen')
                            <a href="#" class="btn btn-primary justify-content-center">Update</a>
                            <a href="#" class="btn btn-danger justify-content-center">Delete</a>
                            @elseif($authRole->roleName=='mahasiswa')
                            <a href="#" class="btn btn-success justify-content-center">Assign</a>
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
        @endif
        @endif
        @endforeach
        @endforeach
    </div>
</div>
@endsection
