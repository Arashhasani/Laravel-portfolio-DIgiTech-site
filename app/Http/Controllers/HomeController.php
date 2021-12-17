<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function comment(Request $request)
    {
       $validata=$request->validate([
           'comment'=>'required',
           'commentable_id'=>'required',
           'commentable_type'=>'required',
       ]);
       auth()->user()->comments()->create($validata);
       return back();

    }
}
