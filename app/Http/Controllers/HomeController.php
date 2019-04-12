<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stamp;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'terms', 'results', 'contact']]);
    }

    public function index(){
        return view('pages.home');
    }

    public function terms(){
        return view('pages.terms');
    }

    public function results(){
        return view('pages.results');
    }

    public function contact(){
        return view('pages.contact');
    }
}
