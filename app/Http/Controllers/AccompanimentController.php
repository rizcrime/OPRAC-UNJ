<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accompaniment;

class AccompanimentController extends Controller
{
    public function index()
    {
        $data = Accompaniment::with('classroom');
        return view('accompaniment.index', compact('data'));
    }
}
