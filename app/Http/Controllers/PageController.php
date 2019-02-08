<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $title = 'WELCOME TO INDEX PAGE';
//        return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = 'WELCOME TO ABOUT PAGE';
        return view('pages.about')->with('title', $title);
    }
    public function service(){
        $title = 'WELCOME TO SERVICE PAGE';
        return view('pages.service')->with('title', $title);
    }
}
