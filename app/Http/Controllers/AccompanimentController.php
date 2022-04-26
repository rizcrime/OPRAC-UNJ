<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accompaniment;
use App\Models\Classroom;
use Illuminate\Support\Facades\Cache;
use DB;

class AccompanimentController extends Controller
{
    public function index()
    {
        $data = Accompaniment::with('classrooms')->get();
        return view('accompaniment.index', compact('data'));
    }

    public function show($id=0)
    {
        $classroom = Classroom::get();
        $data = Accompaniment::where('id', $id)->select('title', 'description')->first();
        return view('accompaniment.create', compact('classroom', 'data', 'id'));
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $desc = $request->desc;
        $classroom = $request->class_rel;

        Accompaniment::create([
            'title' => "$title",
            'description' => $desc,
            'classroom' => $classroom,
        ]);
        return redirect('accompaniment/index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        Accompaniment::where('id', $id)->delete();
        return redirect('accompaniment/index')->with('success','Data Berhasil Dihapus!');
    }

}
