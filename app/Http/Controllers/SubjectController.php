<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Gate;
use Datatables;
use File;
use Illuminate\Support\Facades\Auth;
use App\Label;
use App\Http\Requests\Task\StoreTaskRequest;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class SubjectController extends Controller
{
    function __construct()
    {
        $this->middleware(function($request, $next){
            $this->allData = DB::table('subjects')->get();
            return $next($request);
        });
    }

    public function index()
    {
        $allData = $this->allData;
        return view('subject.index', compact('allData'));
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $desc = $request->desc;
        // File Handler
        $link = $request->file('file');
        $filename = optional($link)->getClientOriginalName();
        $filePath = "promag/tasks/uploaded-$filename.pdf";
        $name =  "https://cdn.erakomp.co.id/$filePath";
        Storage::disk('oss')->put($filePath, file_get_contents($link));

        Classroom::create([
            'title' => $title,
            'description' => $desc,
            'file' => ($request->has('file')) ?  $name : "0",
        ]);
        return redirect('/classroom')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return redirect('/subject')->with('success','Data Berhasil Dihapus!');
    }
}
