<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware(function ($request, $next) {
            $this->name_students = $request->name_students;
            return $next($request);
        });
    }

    public function index()
    {
        $id = $this->name_students;
        $isAccess = '';
        $allData = DB::table('collect_assign')
            ->join('assignments', 'collect_assign.assignment', 'assignments.id')
            ->join('users', 'collect_assign.collector', 'users.id')
            ->join('classrooms', 'assignments.id', 'classrooms.id')
            ->select(
                'classrooms.members',
                'collect_assign.id',
                'collect_assign.description',
                'assignments.title',
                'users.name',
                'collect_assign.score',
                'collect_assign.score_2',
                'collect_assign.collector',
            )
            ->get();
        $score_set = DB::table('collect_assign')
            ->where('collector', $id)
            ->select(
                DB::raw('count(score) as cScore'),
                DB::raw('count(score_2) as cScore2'),
                DB::raw('sum(score) as sScore'),
                DB::raw('sum(score_2) as sScore2'),
            )
            ->get();
        $avg_score = $this->save_div($score_set[0]->sScore, $score_set[0]->cScore);
        $avg_score2 = $this->save_div($score_set[0]->sScore2, $score_set[0]->cScore2);
        $final_avg = round(($avg_score + $avg_score2) / 2, 0, PHP_ROUND_HALF_UP);
        $criteria_score = '';
        switch (true) {
            case in_array($final_avg, range(0, 45)):
                $criteria_score = 'E';
                break;
            case in_array($final_avg, range(46, 50)):
                $criteria_score = 'D';
                break;
            case in_array($final_avg, range(51, 55)):
                $criteria_score = 'C-';
                break;
            case in_array($final_avg, range(56, 60)):
                $criteria_score = 'C';
                break;
            case in_array($final_avg, range(61, 65)):
                $criteria_score = 'C+';
                break;
            case in_array($final_avg, range(66, 70)):
                $criteria_score = 'B-';
                break;
            case in_array($final_avg, range(71, 75)):
                $criteria_score = 'B';
                break;
            case in_array($final_avg, range(76, 80)):
                $criteria_score = 'B+';
                break;
            case in_array($final_avg, range(81, 85)):
                $criteria_score = 'A';
                break;
            case in_array($final_avg, range(86, 100)):
                $criteria_score = 'A+';
                break;
            default:
                $criteria =  "Data is unbounderies";
        }
        $authRole = DB::table('users')
            ->join('roles', 'users.role', 'roles.code')
            ->select('users.name as userName', 'roles.name as roleName')
            ->where('users.id', '=', Auth::id())
            ->first();
        $students = DB::table('users')->where('role', 3)->get();
        foreach ($allData as $ad) {
            $member = explode(',', $ad->members);
            for ($i = 0; $i < count($member); $i++) {
                if ($member[0] == Auth::id() || Auth::id() == $member[1] || $ad->collector == Auth::id()) {
                    $isAccess = 1;
                } else {
                    $isAccess = 0;
                }
            }
        }
        return view('evaluation.index', compact('allData', 'authRole', 'isAccess', 'score_set', 'avg_score', 'avg_score2', 'criteria_score', 'students'));
    }

    public function save_div($a, $b)
    {
        if ($b == 0) {
            return $a / 1;
        } else {
            return $a / $b;
        }
    }

    public function destroy($id)
    {
        DB::table('collect_assign')->where('id', $id)->delete();
        return redirect('/evaluation/index')->with('success', 'Data Berhasil Dihapus!');
    }

    public function edit_score(Request $request, $id)
    {
        $title = $request->title;
        // File Handler
        // $metafile = $request->file;
        // $extension = $metafile->getClientOriginalExtension();
        // $filepath = "media/evaluation/score_proof";
        // $dir = "$filepath\\$title.$extension";
        // $metafile->move($filepath, "$title.$extension");
        DB::table('collect_assign')->where('id', $id)->update([
            'proof' => $request->proof,
            'proof_2' => $request->proof_2,
            'score' => $request->score,
            'score_2' => $request->score_2,
        ]);
        return redirect('evaluation/index')->with(['success' => 'Nilai berhasil diperbaharui!']);
    }
}
