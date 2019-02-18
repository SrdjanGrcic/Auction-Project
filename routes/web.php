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

Route::get('/', 'HomeController@index');

Route::get('/current', 'HomeController@currentAuction');

Route::get('/form', 'HomeController@bidForm');

Route::get('/terms', 'HomeController@terms');

Route::get('/results', 'HomeController@results');

Route::get('/contact', 'HomeController@contact');

Route::get('/users', 'UserController@index');

Route::resource('stamp', 'StampController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');//->name('home');
