@extends('layouts.app')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
<link href="{{ asset('css/fab.css') }}" rel="stylesheet">
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h1 style="text-align: center;">Subject</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="center">No</th>
                        <th class="center">Nama Mata Kuliah</th>
                        <th class="center">Keterangan</th>
                        <th class="center" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $subject)
                    <tr id="rowT">
                        <td class="center">{{ $loop->index+1 }}</td>
                        <td>{{ $subject->title }}</td>
                        <td>{{ $subject->file }}</td>
                        <td class="center"><a href="subjectdelete/{{ $subject->id }}" class="a"><button class="action" onclick="return confirm('yakin?');" id="delete">Delete</button></a></td>
                        <td class="center"><a href="{{ $subject->file }}" class="a"><button class="action" id="download">Lihat</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="#signupModal" data-toggle="modal" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
</div>
<div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal root -->
            <div class="m-header">
                <button style="font-size: 50px" class="close" data-dismiss="modal">×</button>
                <h2 class="myModalLabel"> Tambah File </h2>
            </div>
            <!-- Modal body -->
            <div class="inputs">
                <form method="POST" action="{{route('subject.post')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __('Nama Judul')
                            }}</label>
                        <div class="col-md-6">
                            <input id="filename" name="filename" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="formFile" class="col-md-4 col-form-label text-md-end">File Upload</label>
                        <div class="col-md-6">
                            <input type="file" id="file" class="file">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __('Keterangan')
                            }}</label>
                        <div class="col-md-6">
                            <input id="desc" name="desc" class="form-control" required>
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
