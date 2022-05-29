@extends('layouts.app')
@section('content')
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
                            <a data-target="#assignstore-{{$subject->id}}" data-toggle="modal" class="a btn btn-warning"> Tugaskan </a>
                            @endif
                            @if($myData->myRole == "mahasiswa")
                            <a href="{{ $subject->file }}"><button class="action btn btn-info">Lihat Tugas</button></a>
                            @endif
                            <a href="{{ $subject->file }}" class="a"><button class="action btn" id="download">Lihat</button></a>
                        </td>
                    </tr>
                    <div class="modal fade" id="assignstore-{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal root -->
                                <div class="m-header">
                                    <button style="font-size: 50px" class="close" data-dismiss="modal">×</button>
                                    <h2 class="myModalLabel"> Buat Tugas </h2>
                                </div>
                                <div class="inputs">
                                    <div class="content">
                                        <div class="col-md-12">
                                            <form action="{{ route('create.assign') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="assignFile" class="col-md-4 col-form-label text-md-end">File
                                                        Upload(*pdf)</label>
                                                    <div class="col-md-6">
                                                        <input type="file" onchange="validateSize(this, 10240)" accept="application/pdf" id="assignFile" name="assignFile">
                                                    </div>
                                                </div>
                                                <div class="row mb-3" hidden>
                                                    <div class="col-md-6">
                                                        <input id="id_ass" name="id_ass" value="{{$subject->id}}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __("Subject") }}</label>
                                                    <div class="col-md-6">
                                                        <input id="subject-ass" name="subject-ass" value="{{$subject->title}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="title_ass" class="col-md-4 col-form-label text-md-end">{{ __("Title") }}</label>
                                                    <div class="col-md-6">
                                                        <input id="title_ass" name="title_ass">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="desc_ass" class="col-md-4 col-form-label text-md-end">{{ __("Description") }}</label>
                                                    <div class="col-md-6">
                                                        <input id="desc_ass" name="desc_ass">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="due" class="col-md-4 col-form-label text-md-end">{{ __("Deadline") }}</label>
                                                    <div class="col-md-6">
                                                        <input id="due_ass" name="due_ass" type="date">
                                                    </div>
                                                </div>
                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button id="upload-assign" type="submit" class="btn btn-primary">
                                                            {{ __('Submit') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <select class="form-control" name="roomc" id="roomc" required>
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
                            <button id="upload" type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#upload').bind("click", function() {
            var txtTitle = $('#title').val();
            var imgVal = $('#file').val();
            var txtVal = $('#roomc').val();
            if (imgVal == '' || txtVal == '' || txtTitle == '') {
                alert("Semua Wajib di isi kecuali KETERANGAN");
                return false;
            }
        });
    });
</script>

@endsection