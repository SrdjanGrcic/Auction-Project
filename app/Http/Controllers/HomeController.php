<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function currentAuction(){
        return view('pages.currentAuction');
    }

    public function bidForm(){
        return view('pages.bidForm');
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
