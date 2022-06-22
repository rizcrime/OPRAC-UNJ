<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware(function($request, $next){
            $mine = Auth::user()->id;
            $this->classroom = DB::table('classrooms')
            ->join('lessons', 'classrooms.lesson', 'lessons.id')
            ->select('classrooms.link_g_meet as link', 'classrooms.logo as logo', 'classrooms.classname as classname', 'members', 'classrooms.id as id', 'lessons.name as ln')
            ->whereRaw("FIND_IN_SET($mine,members)")
            ->get();
            $this->lesson = DB::table('lessons')
            ->select('id as id', 'name as name')
            ->get();
            $this->authRole = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName')
            ->where('users.id', '=', Auth::id())
            ->first();
            $this->allDosen = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName', 'roles.code as code', 'users.id as idDosen')
            ->where('roles.name', '=', 'dosen')
            ->get();
            $this->allPengawas = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName', 'roles.code as code', 'users.id as idPengawas')
            ->where('roles.name', '=', 'pembimbing')
            ->get();
            $this->allMahs = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName', 'roles.code as code', 'users.id as idMhs')
            ->where('roles.name', '=', 'mahasiswa')
            ->get();
            return $next($request);
        });
    }

    function index()
    {
        $classroom = $this->classroom;
        $authRole = $this->authRole->roleName;
        $allDosen = $this->allDosen;
        $allPengawas = $this->allPengawas;
        $allMahs = $this->allMahs;
        $lesson = $this->lesson;
        $array = explode(',', $classroom);
        return view('classroom.index', compact('classroom', 'allPengawas', 'allMahs', 'authRole', 'allDosen', 'lesson'));
    }

    function store(Request $request)
    {
        $cn = $request->classname;
        $rm = $request->rm;
        $pengawas = $request->pengawas;
        $students = implode(',', array_values($request['student']));
        $pelajaran = $request->pelajaran;
        $link = $request->link;
        // File Handler
        $metafile = $request->file;
        $extension = $metafile->getClientOriginalExtension();
        $filepath = "media/classroom/";
        $dir = "$filepath\\$cn.$extension";
        $metafile->move($filepath, "$cn.$extension");

        Classroom::insert([
            'members' => "$rm,$pengawas,$students",
            'lesson' => $pelajaran,
            'classname' => $cn,
            'link_g_meet' => $link,
            'logo' => ($request->has('file')) ? "$dir" : "no file",
        ]);
        return redirect('/classroom')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        DB::table('classrooms')->where('id', $id)->delete();
        return redirect('/classroom')->with('success','Data Berhasil Dihapus!');
    }

}
