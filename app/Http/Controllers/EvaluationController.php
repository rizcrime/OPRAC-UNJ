<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index()
    {
        $allData = DB::table('collect_assign')
            ->join('assignments', 'collect_assign.assignment', 'assignments.id')
            ->select(
                'collect_assign.id',
                'collect_assign.description',
                'assignments.title',
                'users.name',
                'collect_assign.score',
                'collect_assign.collector',
                'collect_assign.assessor'
            )
            ->join('users', 'collect_assign.collector', 'users.id')->get();
        $authRole = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName')
            ->where('users.id', '=', Auth::id())
            ->first();
        // return $allData;
        return view('evaluation.index', compact('allData', 'authRole'));
    }

    public function destroy($id)
    {
        DB::table('collect_assign')->where('id', $id)->delete();
        return redirect('/evaluation/index')->with('success','Data Berhasil Dihapus!');
    }

    public function edit_score(Request $request, $id){
        DB::table('collect_assign')->where('id', $id)->update([
            'proof' => $request->proof,
            'proof_2' => $request->proof_2,
            'score' => $request->score,
            'score_2' => $request->score_2,
        ]);
        return redirect('evaluation/index')->with(['success' => 'Nilai berhasil diperbaharui!']);
    }
}
