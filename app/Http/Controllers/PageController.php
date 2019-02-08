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
        $data = array(
            'title' => 'WELCOME TO SERVICE PAGE',
            'services' => ['java', 'php', 'ruby']
        );

        return view('pages.service')->with($data);
    }
}
