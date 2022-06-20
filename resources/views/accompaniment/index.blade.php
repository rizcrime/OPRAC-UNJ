@extends('layouts.app')
@section('content')
<style>
    .imgBtn:hover {
        cursor: pointer;
    }
</style>
<link href="{{ asset('css/fab.css') }}" rel="stylesheet">
@foreach($data as $key=>$value)
@foreach($isMember as $iM)
@if($iM == Auth::id())
<div class="container-fluid flex-wrap" style="padding: 2%;">
    @foreach ($value as $val)
    <div id="s{{ $val->classroom }}">
        @endforeach
        <div class="accordion-item">
            <h5 id="headingOne" class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#s{{ $val->classroom }}One">
                    {{ $key }}
                </button>
            </h5>
        </div>
        <div class="card">
            @foreach ($value as $val)
            <div id="s{{ $val->classroom }}One" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#s{{ $val->classroom }}">
                <div class=" d-flex bd-highlight">
                    <button class="accordion-button p-2 flex-grow-1 bd-highlight" data-bs-toggle="collapse" data-bs-target="#s{{ $val->classroom }}OneA">{{ $val->title }}
                    </button>
                    <a href="../accompaniment/create/{{ $val->id }}">
                        <i class="fa fa-edit fa-3x imgBtn" id="edit_note" style="padding: 5px;"></i>
                    </a>
                    <a href="../accompaniment/delete/{{ $val->id }}" onclick="return confirm('Are you sure?');">
                        <i class="fa fa-trash fa-3x imgBtn" id="delete_note" style="padding: 5px;"></i>
                    </a>
                </div>
                <div class="bg-info accordion-collapse collapse" id="s{{ $val->classroom }}OneA">
                    <div class="accordion-body" style="text-overflow: ellipsis; width: 100%; overflow: hidden;
                            white-space: nowrap;">
                        {{ strip_tags( $val->description ) }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endforeach
@endforeach
<a href="../accompaniment/create/0" class="float">
    <i class="fa fa-plus my-float"></i>
</a>
@endsection