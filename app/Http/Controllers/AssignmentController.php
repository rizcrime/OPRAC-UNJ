<?php

namespace App\Http\Controllers;

use App\Models\Collect;
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
        $authRole = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName')
            ->where('users.id', '=', Auth::id())
            ->first();
        $isMember = $c->spreMems($this->datas,2);
        return view('subject.assignment', compact('allData', 'isMember', 'authRole'));
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
            'score' => '0',
        ]);
        return redirect('/classroom')->with(['success' => 'Tugas berhasil dikumpulkan']);
    }

}
