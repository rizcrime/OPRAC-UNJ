@extends('layouts.app')
@section('content')
<div class="card" style="margin-bottom: 100px;">
    <div class="card-body">
        <div class="card-title">
            <h1 style="text-align: center;">Evaluation</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No#</th>
                        <th class="center">Judul</th>
                        <th class="center">Pengumpul</th>
                        <th class="text-center">Note</th>
                        @if($authRole->roleName == 'dosen' || $authRole->roleName == 'pembimbing')
                        <th class="center">Bukti Penliaian</th>
                        <th class="center">Nilai</th>
                        @endif
                        <th class="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $ad=>$value)
                    @if($value->collector == Auth::id() || $value->assessor == Auth::id())
                    <tr>
                        <td>{{$ad+1}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->description}}</td>
                        <form method="POST" action="{{ route('score_edt.post', ['id' => $value->id??'']) }}">
                            @csrf
                            @if($authRole->roleName == 'dosen')
                            <td><input type="file" id="proof" name="proof"></td>
                            <td><input value="{{$value->score}}" name="score" id="score"></td>
                            @elseif($authRole->roleName == 'pembimbing')
                            <td><input type="file" id="proof_2" name="proof_2"></td>
                            <td><input value="{{$value->score}}" name="score_2" id="score_2"></td>
                            @endif
                            <td class="center">
                                @if($authRole->roleName == 'dosen')
                                <input type="submit" class="btn btn-success" value="Submit">
                                @else
                                <a href="../evaluationdelete/{{ $value->id }}" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                @endif
                            </td>
                        </form>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    table td {
        position: relative;
    }

    #score {
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
    }
</style>
@endsection