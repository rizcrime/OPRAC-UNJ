<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Support\Carbon;
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
        $allData = $this->datas;
        $b = [];
        foreach($this->datas as $d){
            array_push($b, $d); 
        }
        // return $b;
        $authRole = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName')
            ->where('users.id', '=', Auth::id())
            ->first();
        return view('subject.assignment', compact('allData', 'authRole'));
    }

    public function destroy($id){
        DB::table('assignments')->where('id', $id)->delete();
        return redirect('assignment')->with('success','Data Berhasil Dihapus!');
    }

    public function collect()
    {
        DB::table('collect_assign')->insert([
            'assignment' => $this->assignment,
            'collector' => Auth::user()->id,
            'file' => $this->file,
            'description' => $this->description,
            'proof'=>'',
            'proof_2'=>'',
            'score' => '0',
            'score_2' => '0',
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        return redirect('/evaluation/index')->with(['success' => 'Tugas berhasil dikumpulkan']);
    }

}
