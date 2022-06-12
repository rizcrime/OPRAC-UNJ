@extends('layouts.app')
@section('content')
<div class="container-fluid flex-wrap">
    <div class="row justify-content-center">
        @foreach($classroom as $item)
        <div class="card" style="width: 18rem; margin: 2%">
            <a href="{{$item->link}}">
                <div class="card-header">
                    <img style="object-fit:cover; height:25vh; width:100%" src="{{ asset($item->logo) }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-limit">
                        {{$item->classname}}
                    </h5>
                    <p class="card-text text-limit">{{$item->ln}}</p>
                </div>
                @if($authRole=='dosen')
                <div class="card-footer d-flex h-100" onclick="return confirm('Are you sure?');">
                    <a href="classroomdelete/{{ $item->id }}" class="align-self-end btn btn-danger form-control">Delete</a>
                </div>
                @endif
            </a>
        </div>
        @endforeach
    </div>
    @if($authRole == "dosen")
    <a href="#signupModal" data-toggle="modal" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
    @endif
</div>
<div class="modal fade" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal root -->
            <div class="m-header">
                <i class="bi bi-x-circle-fill btn" style="color: #fc3d03; height:5%; width:5%;" data-dismiss="modal"></i>
                <h2 class="myModalLabel">Tambah Virtual Kelas</h2>
            </div>
            <!-- Modal body -->
            <div class="inputs">
                <form method="POST" action="{{ route('classroom.post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="formFile" class="col-md-4 col-form-label text-md-end">Logo Kelas(*Image)</label>
                        <div class="col-md-6">
                            <input type="file" onchange="validateSize(this, 1024)" accept="image/png" id="file" name="file" class="file">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __("Nama Kelas") }}</label>
                        <div class="col-md-6">
                            <input onkeyup="symbolBoundaries('classname')" id="classname" name="classname" class="form-control" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Room Master") }}</label>
                        <div class="col-md-6">
                            <input value="{{Auth::User()->name}}" id="rm" name="rm" class="form-control" readonly disabled />
                            <input type="hidden" id="rm" name="rm" class="form-control" value="{{Auth::User()->id}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Pembimbing") }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="pengawas" id="pengawas">
                                @foreach ($allPengawas as $allPengawas)
                                <option value="{{$allPengawas->idPengawas}}">
                                    {{$allPengawas->userName}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Pelajaran") }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="pelajaran" id="pelajaran">
                                @foreach ($lesson as $lesson)
                                <option value="{{$lesson->id}}">
                                    {{$lesson->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __("Link Conference")
                            }}</label>
                        <div class="col-md-6">
                            <input id="link" name="link" class="form-control" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="student">{{ __("Mahasiswa") }}</label>
                        <div class="col-md-6">
                            <select required id="student" class="multiselect" name="student[]" multiple="multiple">
                                @foreach ($allMahs as $student)
                                <option value="{{$student->idMhs}}">
                                    {{ $student->userName }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __("Generate Kelas") }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        jQuery("#student").multiselect({
            enableFiltering: true,
        });
    });
</script>

<style>
    .text-limit {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }
</style>

@endsection