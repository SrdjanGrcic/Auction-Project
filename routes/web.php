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

Route::get('/terms', 'HomeController@terms');

Route::get('/results', 'HomeController@results');

Route::get('/contact', 'HomeController@contact');

Auth::routes();

$router->group(['prefix' => 'dashboard', 'as'=>'dashboard.'], function() use ($router){
    $router->get('/', 'DashboardController@index')->name('index');
    $router->get('/current', 'DashboardController@current')->name('current');
    $router->get('/form', 'DashboardController@bidForm')->name('bid_form');
    $router->get('/results', 'DashboardController@auctionResults')->name('results');

    $router->get('/users', 'DashboardController@allUsers')->name('users');
    $router->get('/bids', 'DashboardController@showBids')->name('bids');

    $router->get('/add', 'DashboardController@addStamp')->name('add');
    //$router->get('/stamp_details', 'DashboardController@stampDetails')->name('details');
    $router->get('/make_bid', 'DashboardController@createBidView')->name('make_bid');
    $router->post('myBid', array('uses' => 'DashboardController@createBid'));
});

Route::resource('dashboard', 'DashboardController');
