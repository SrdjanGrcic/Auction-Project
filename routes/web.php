<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/form', function () {
    return view('pages.bidForm');
});

Route::get('/current', function () {
    return view('pages.currentAuction');
});

Route::get('/results', function () {
    return view('pages.results');
});

Route::get('/terms', function () {
    return view('pages.terms');
});

Route::get('/contact', function () {
    return view('pages.contact');
});