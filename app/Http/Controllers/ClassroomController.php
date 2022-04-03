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
        $this->middleware(function($request, $next){
            $mine = Auth::user()->id;
            $value = "3";
            $this->classroom = DB::table('classrooms')
            ->join('lessons', 'classrooms.lesson', 'lessons.code')
            ->select('classrooms.link_g_meet as link', 'lessons.name as lessonName', 'members')
            ->whereRaw("FIND_IN_SET('3',members)")
            ->get();
            $this->lesson = DB::table('lessons')
            ->select('code as code', 'name as name')
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
            ->where('roles.name', '=', 'pengawas')
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
        $lesson = $this->lesson;
        $array = explode(',', $classroom);
        return view('classroom.index', compact('classroom', 'allPengawas', 'authRole', 'allDosen', 'lesson'));
    }

    function store(Request $request)
    {
        $rm = $request->rm;
        $dosen = $request->dosen;
        $pengawas = $request->pengawas;
        $pelajaran = $request->pelajaran;
        Classroom::create([
            'members' => "$rm,$dosen,$pengawas",
            'lesson' => $pelajaran,
            'class' => '12345',
            'link_g_meet' => 'https://meet.google.com/iussisd'
        ]);
        return redirect()->route('getClassroom')->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
