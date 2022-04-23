<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accompaniment;

class AccompanimentController extends Controller
{
    public function index()
    {
        $data = Accompaniment::find(1);
        return view('accompaniment.index', compact('data'));
    }
}
