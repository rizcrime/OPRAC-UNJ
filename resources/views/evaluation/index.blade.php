@extends('layouts.app')
@section('content')
<div class="card" style="margin-bottom: 100px;">
    <div class="card-body">
        <div class="card-title">
            <h1 style="text-align: center;">Evaluation</h1>
        </div>
        @if($authRole->roleName == 'dosen' || $authRole->roleName == 'pembimbing')
        <form method="POST" action="{{ route('choose.students') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <select class="form-control" name="name_students" id="name_students">
                        <option>
                            Pilih Mahasiswa
                        </option>
                        @foreach($students as $st)
                        <option value="{{$st->id}}">
                            {{$st->id}} - {{$st->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
        </form>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No#</th>
                    <th class="center">Judul</th>
                    <th class="center">Pengumpul</th>
                    <th class="text-center">Note</th>
                    @if($authRole->roleName != 'mahasiswa')
                    <!-- <th colspan="2" class="center">Bukti Penilaian<br>(Dosen&nbsp|&nbspPembimbing)</th> -->
                    @endif
                    <th colspan="2" class="center">Nilai<br>(Dosen&nbsp|&nbspPembimbing)<br></th>
                    <th class="center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allData as $ad=>$value)
                @if($isAccess == 1)
                <tr>
                    <td class="text-center">{{$ad+1}}</td>
                    <td>{{$value->title}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->description}}</td>
                    @if($authRole->roleName == 'mahasiswa')
                    <td class="text-end">{{$value->score}}</td>
                    <td class="text-end">{{$value->score_2}}</td>
                    @endif
                    <form method="POST" action="{{ route('score_edt.post', ['id' => $value->id??'']) }}">
                        @csrf
                        @if($authRole->roleName != 'mahasiswa')
                        <!-- <td><input type="file" id="proof" name="proof"></td>
                        <td><input type="file" id="proof_2" name="proof_2"></td> -->
                        <td><input type="number" value="{{$value->score}}" class="score" name="score" id="score"></td>
                        <td><input type="number" value="{{$value->score_2}}" class="score" name="score_2" id="score_2"></td>
                        @endif
                        <td class="center">
                            @if($authRole->roleName != 'mahasiswa')
                            <input type="submit" class="btn btn-success" value="Submit">
                            @endif
                            <a href="../evaluationdelete/{{ $value->id }}" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </form>
                </tr>
                @endif
                @endforeach
            </tbody>
            @if($authRole->roleName!='mahasiswa')
            <tfoot>
                <tr>
                    <th class="text-end" colspan="6">Total Penilaian</th>
                    <td class="text-end">{{$score_set[0]->sScore}}</td>
                    <td class="text-end">{{$score_set[0]->sScore2}}</td>
                </tr>
                <tr>
                    <th class="text-end" colspan="6">Rata-Rata</th>
                    <td class="text-end">{{$avg_score}}</td>
                    <td class="text-end">{{$avg_score2}}</td>
                </tr>
                <tr>
                    <th class="text-end" colspan="6">Hasil</th>
                    <td class="text-center" colspan="2">{{$criteria_score}}</td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
</div>
</div>

<script>
    $('#name_students').on('change', function(e) {
        $(this).closest('form').submit();
    });

    $(document).ready(function() {
        $(".score").attr({
            "max": 100,
            "min": 0
        });
    });
</script>

<style>
    tr th {
        vertical-align: middle;
    }

    td {
        vertical-align: middle;
    }

    table td {
        position: relative;
    }

    .score {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        border: none;
        padding: 10px;
        box-sizing: border-box;
        text-align: end;
    }
</style>
@endsection