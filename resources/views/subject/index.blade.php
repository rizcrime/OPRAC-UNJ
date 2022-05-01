@extends('layouts.app')
@section('content')
<link href="{{ asset('css/fab.css') }}" rel="stylesheet">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
<div class="card" style="margin-bottom: 100px;">
    <div class="card-body">
        <div class="card-title">
            <h1 style="text-align: center;">Subject</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="center">Nama Mata Kuliah</th>
                        <th class="center">Keterangan</th>
                        <th class="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $subject)
                    @foreach($isMember as $iM)
                    @if($iM == Auth::id())
                    <tr id="rowT">
                        <td>{{ $subject->title }}</td>
                        <td>{{ $subject->description }}</td>
                        <td class="center">
                            @if($myData->myRole == "dosen")
                            <a href="subjectdelete/{{ $subject->id }}" class="a"><button class="action btn" onclick="return confirm('yakin?');" id="delete">Delete</button></a>
                            @endif
                            <a href="{{ $subject->file }}" class="a"><button class="action btn" id="download">Lihat</button></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if($myData->myRole == "dosen")
    <a href="#signupModal" data-toggle="modal" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
    @endif
</div>
<div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal root -->
            <div class="m-header">
                <button style="font-size: 50px" class="close" data-dismiss="modal">×</button>
                <h2 class="myModalLabel"> Tambah Subject </h2>
            </div>
            <!-- Modal body -->
            <div class="inputs">
                <form method="POST" action="{{route('subject.post')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __('Nama Judul')
                            }}</label>
                        <div class="col-md-6">
                            <input onkeyup="symbolBoundaries('title')" id="title" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="formFile" class="col-md-4 col-form-label text-md-end">File Upload(*pdf)</label>
                        <div class="col-md-6">
                            <input type="file" onchange="validateSize(this, 10240)" accept="application/pdf" id="file" name="file" class="file">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __('Keterangan')
                            }}</label>
                        <div class="col-md-6">
                            <input id="desc" name="desc" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Kelas") }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="roomc" id="roomc">
                                @foreach ($allClass as $allClass)
                                <option value="{{$allClass->id}}">
                                    {{$allClass->classname}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
