@extends('layouts.app')
@section('content')
@foreach ($allData as $ad)
@foreach($isMember as $iM)
@if($iM == Auth::id())
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <strong>Ditugaskan pada</strong> {{ date('l, d-F-Y H:m', strtotime($ad->created_at)) }}
        </div>
        <div class="card-body">
            <p name="assignment" id="assignment" hidden>{{ $ad->subjects->id }}</p>
            <h5 class="card-title"><strong>Kelas</strong> : {{ $ad->subjects->title }}</h5>
            <p class="card-text"><strong>Catatan</strong> : {{ $ad->subjects->description }}</p>
            <a href="#" class="btn btn-primary">Assign</a>
        </div>
        <div class="card-footer text-muted">
            <div class="btn btn-danger"><strong>Deadline</strong> {{ date('l, d-F-Y H:m', strtotime($ad->due)) }}</div>
        </div>
    </div>
</div>
@endif
@endforeach
@endforeach
@endsection
