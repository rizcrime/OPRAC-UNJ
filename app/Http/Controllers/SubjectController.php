<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;

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
        $metafile = $request->file;
        $extension = $metafile->getClientOriginalExtension();
        $filepath = 'C:\xampp_new\htdocs\file\subject';
        $link = "$filepath\\$title.$extension";
        $metafile->move($filepath, "$title.$extension");

        Subject::create([
            'title' => $title,
            'description' => $desc,
            'file' => ($request->has('file')) ?  "$link" : "no file",
        ]);
        return redirect('/subject')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return redirect('/subject')->with('success','Data Berhasil Dihapus!');
    }
}
