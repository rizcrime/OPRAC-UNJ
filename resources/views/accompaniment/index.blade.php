@extends('layouts.app')
@section('content')
<style>
    .imgBtn:hover {
        cursor: pointer;
    }
</style>
<link href="{{ asset('css/fab.css') }}" rel="stylesheet">
@foreach($data as $value)
<div class="container">
    <div id="s{{ $value->classrooms->id }}">
        <div class="accordion-item">
            <h5 id="headingOne" class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                    data-bs-target="#s{{ $value->classrooms->id }}One">
                    {{ $value->classrooms->classname }}
                </button>
            </h5>
        </div>
        <div class="card">
            <div id="s{{ $value->classroom }}One" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#s{{ $value->classroom }}">
                <div class=" d-flex bd-highlight">
                    <button class="accordion-button p-2 flex-grow-1 bd-highlight" data-bs-toggle="collapse"
                        data-bs-target="#s{{ $value->classroom }}OneA">{{ $value->title }}
                    </button>
                    <a href="../accompaniment/create/{{ $value->id }}">
                        <i class="fa fa-edit fa-3x imgBtn" id="edit_note" style="padding: 5px;"></i>
                    </a>
                    <a href="../accompaniment/delete/{{ $value->id }}">
                        <i class="fa fa-trash fa-3x imgBtn" id="delete_note" style="padding: 5px;"></i>
                    </a>
                </div>
                <div class="accordion-collapse collapse" id="s{{ $value->classroom }}OneA">
                    <div class="accordion-body">
                        {{ $value->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<a href="../accompaniment/create/0" class="float">
    <i class="fa fa-plus my-float"></i>
</a>
@endsection
