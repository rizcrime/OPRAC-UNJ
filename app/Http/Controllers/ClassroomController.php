<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClassroomController extends Controller
{


    function index()
    {
        $classes = DB::select('select * from classroom')->get();
    }
}
