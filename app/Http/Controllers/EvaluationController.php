<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index()
    {
        $allData = DB::table('collect_assign')->get();
        return view('evaluation.index', compact('allData'));
    }
}
