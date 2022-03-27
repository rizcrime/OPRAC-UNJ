<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    function __construct()
    {
        $this->middleware(function($request, $next){
            $this->allData = DB::table('classrooms')
            ->join('users', 'classrooms.user_id', 'users.id')
            ->select('users.name as users_name', 'users.role as flag','classrooms.link_g_meet as link')->get();
            return $next($request);
        });
    }

    function index()
    {
        $data = $this->allData;
        return view('classroom.index', compact('data'));
    }

    function create()
    {
        
    }

}
