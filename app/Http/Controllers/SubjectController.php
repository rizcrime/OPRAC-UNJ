<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\SpreadComma;

class SubjectController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware(function($request, $next){
            $this->allData = DB::table('subjects')->get();
            $this->myId = Auth::user()->role;
            $this->mineData = User::join('roles', 'users.role', 'roles.code')
                ->select('roles.name as myRole')
                ->where('roles.id', '=', $this->myId)
                ->first();
            $this->allClass = Classroom::get();
            $this->joinClass = Subject::with('classrooms')->get();
            return $next($request);
        });
    }

    public function index()
    {
        $c = new SpreadComma;
        $allData = $this->allData;
        $myData = $this->mineData;
        $allClass = $this->allClass;
        $isMember = $c->spreMems($this->joinClass,1);
        return view('subject.index', compact('allData', 'myData', 'allClass', 'isMember'));
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $desc = $request->desc;
        $roomCls = $request->roomc;
        // File Handler
        $metafile = $request->file;
        $extension = $metafile->getClientOriginalExtension();
        $filepath = 'media/subject/file';
        $link = "$filepath\\$title.$extension";
        $metafile->move($filepath, "$title.$extension");

        Subject::create([
            'title' => $title,
            'description' => $desc,
            'classroom' => $roomCls,
            'file' => ($request->has('file')) ?  "$link" : "no file",
        ]);
        return redirect('/subject')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return redirect('/subject')->with('success','Data Berhasil Dihapus!');
    }

    public function createAssign(Request $request)
    {
        $metafile = $request->assignFile;
        $extension = $metafile->getClientOriginalExtension();
        $filepath = 'media/subject/file/tugas';
        $link = "$filepath\\'test.'$extension";
        $metafile->move($filepath, "test.$extension");
        Assignment::create([
            'title' => $request->title_ass,
            'subject' => $request->id_ass,
            'file' => $link,
            'description' => $request->desc_ass,
            'due' => $request->due_ass
        ]);
        return redirect('/assignment')->with('success','Data Berhasil Ditambahkan!');
    }

}
