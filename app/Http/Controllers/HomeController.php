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
        $this->middleware('auth', ['except' => ['index', 'currentAuction', 'terms', 'contact']]);
    }

    public function index(){
        return view('pages.home');
    }

    public function currentAuction(){

        $stamps = Stamp::orderBy('created_at', 'desc')->get();

        return view('pages.currentAuction')->with('stamps', $stamps);
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
