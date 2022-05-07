<html>

<head>
    <title>How to Use Summernote WYSIWYG Editor with Laravel? - ItSolutionStuff.com</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>

<style>
    .imgBtn:hover {
        cursor: pointer;
    }
</style>

<body>
    <div class="pos-f-t">
        <nav class="navbar navbar-white border">
            <img class="imgBtn" onclick="history.back()" style="width: 2%; height: auto;"
                src="{{ asset('media/left.png') }}">
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">
                            Catatan
                        </h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('acc.store', ['id' => $id??''])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label><strong>Judul :</strong></label>
                                <input id="title" type="text" name="title" class="form-control" value="{{ $data->title??'' }}"/>
                            </div>
                            <div class="form-group">
                                <label><strong>Deskripsi :</strong></label>
                                <textarea id="desc" class="summernote" name="desc">{{ $data->description??'' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>Kelas Tujuan :</strong></label>
                                @foreach($classroom as $clr)
                                @foreach($isMember as $iM)
                                @if($iM == Auth::id())
                                <div class="form-control">
                                    <input type="radio" name="class_rel" id="class_rel" value="{{ $clr->id }}" {{ ($clr->id == ($data->classroom??'0')) ? 'checked' : '' }}>
                                    <label for="flexRadioDefault1">
                                        {{ $clr->classname }}
                                    </label>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                            @if(empty($data->title))
                            <div class="form-group card text-center">
                                <button type="submit" value="save" name="action" class="btn btn-success btn-sm">Save</button>
                            </div>
                            @else
                            <div class="form-group card text-center">
                                <button type="submit" value="update" name="action" class="btn btn-success btn-sm">Update</button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.summernote').summernote();
        });
    </script>
</body>

</html>
