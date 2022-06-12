<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- 3rd Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="card" style="margin: 2%">
            <div class="card-body">
                <form method="post" action="{{ route('acc.store', ['id' => $id??''])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label><strong>Judul :</strong></label>
                        <input id="title" type="text" name="title" class="form-control" value="{{ $data->title??'' }}" />
                    </div>
                    <div class="form-group">
                        <label><strong>Deskripsi :</strong></label>
                        <textarea id="desc" class="summernote" name="desc">{{ $data->description??'' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label><strong>Kelas Tujuan :</strong></label>
                        @foreach($classroom as $clr)
                        <div class="form-control">
                            <input type="radio" name="class_rel" id="class_rel" value="{{ $clr->id }}" {{ ($clr->id == ($data->classroom??'0')) ? 'checked' : '' }}>
                            <label for="flexRadioDefault1">
                                {{ $clr->classname }}
                            </label>
                        </div>
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
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
    });
</script>
<style>
    .imgBtn:hover {
        cursor: pointer;
    }
</style>