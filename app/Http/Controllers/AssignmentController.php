<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Helpers\SpreadComma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
        $this->middleware(function($request, $next){
            $this->datas = Assignment::with('subjects.classrooms')->get();
            $this->assignment = $request->assignment;
            $this->file = $request->file;
            $this->title = $request->title;
            $this->description = $request->description;
            return $next($request);
        });
    }

    public function index(){
        $c = new SpreadComma;
        $allData = $this->datas;
        // return $allData;
        $isMember = $c->spreMems($this->datas,2);
        return view('subject.assignment', compact('allData', 'isMember'));
    }

    public function collect()
    {
        DB::create([
            'assignment' => $this->assignment,
            'collector' => Auth::user()->id,
            'file' => $this->file,
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }

}
