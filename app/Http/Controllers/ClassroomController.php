<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ClassroomController extends Controller
{
    function __construct()
    {
        $this->middleware(function($request, $next){
            $this->classroom = DB::table('classrooms')
            ->join('lessons', 'classrooms.lesson', 'lessons.code')
            ->select('classrooms.link_g_meet as link', 'lessons.code as code', 'lessons.name as lesson')
            ->get();
            $this->authRole = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName')
            ->where('users.id', '=', Auth::id())
            ->first();
            $this->allDosen = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName', 'roles.code as code')
            ->where('roles.name', '=', 'dosen')
            ->get();
            $this->allPengawas = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName', 'roles.code as code')
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
        return view('classroom.index', compact('classroom', 'allPengawas', 'authRole', 'allDosen'));
    }

}
