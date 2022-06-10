<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index()
    {
        $allData = DB::table('collect_assign')
            ->join('assignments', 'collect_assign.assignment', 'assignments.id')
            ->select('collect_assign.description', 'assignments.title', 'users.name', 'collect_assign.score')
            ->join('users', 'collect_assign.collector', 'users.id')->get();
        // return $allData;
        return view('evaluation.index', compact('allData'));
    }
}
