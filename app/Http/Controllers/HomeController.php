<?php

namespace App\Http\Controllers;

use App\Models\Dash;
use App\Models\Content;
use App\Models\Contact;
use App\Models\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_dash = Dash::where('deleted_at', NULL)->first();
        $data_content = Content::with('pages')->where('deleted_at', NULL)->get();
        $data_conte = Page::with('contents')->get();
        // return $data_conte;
        $data_contact = Contact::first();
        return view('home', compact('data_dash', 'data_content', 'data_conte', 'data_contact'));
    }
}
