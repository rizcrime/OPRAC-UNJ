<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accompaniment;
use App\Models\Classroom;
use App\Helpers\SpreadComma;

class AccompanimentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware(function($request, $next){
            $this->title = $request->title;
            $this->classroom = $request->class_rel;
            $this->content = $request->desc;
            return $next($request);
        });
    }

    public function index()
    {
        $data = Accompaniment::with('classrooms')->get()->groupBy('classrooms.classname');
        return view('accompaniment.index', compact('data'));
    }

    public function show($id)
    {
        $c = new SpreadComma;
        $classroom = Classroom::get();
        $data = Accompaniment::where('id', $id)->first();
        $datas = Accompaniment::with('classrooms')->get();
        return view('accompaniment.create', compact('classroom', 'data', 'id', 'datas'));
    }

    public function store(Request $request, $id)
    {
        // Media content on Text Area Summernote
        $content = $this->content;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');
           list($data) = explode(';', $data);
           list($data) = explode(',', $data);
           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        switch ($request['action']) {
            case 'save' :
                Accompaniment::create([
                    'title' => $this->title,
                    'description' => $content,
                    'classroom' => $this->classroom,
                ]);
                return redirect('accompaniment/index')->with(['success' => 'Data Berhasil Disimpan!']);
            break;
            case 'update' :
                Accompaniment::where('id', $id)->update([
                    'title' => $this->title,
                    'description' => $content,
                    'classroom' => $this->classroom,
                ]);
                return redirect('accompaniment/index')->with(['success' => 'Data Berhasil Disimpan!']);
            break;
        }
    }

    public function update($id)
    {
        Accompaniment::where('id', $id)->update([
            'title' => $this->title,
            'description' => $this->content,
            'classroom' => $this->classroom,
        ]);
        return redirect('accompaniment/index')->with(['success' => 'Data Berhasil Diperbaharui!']);
    }

    public function destroy($id)
    {
        Accompaniment::where('id', $id)->delete();
        return redirect('accompaniment/index')->with('success','Data Berhasil Dihapus!');
    }

}
