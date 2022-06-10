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
                        <th class="center">Judul</th>
                        <th class="center">Pengumpul</th>
                        <th class="text-center">Note</th>
                        <th class="center">Nilai</th>
                        <th class="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $ad)
                    <tr>
                        <td>{{$ad->title}}</td>
                        <td>{{$ad->name}}</td>
                        <td>{{$ad->description}}</td>
                        <td>{{$ad->score}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection