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

Route::get('/terms', 'HomeController@terms');

Route::get('/results', 'HomeController@results');

Route::get('/contact', 'HomeController@contact');

Auth::routes();

$router->group(['prefix' => 'dashboard', 'as'=>'dashboard.'], function() use ($router){
    $router->get('/', 'DashboardController@index')->name('index');
    $router->get('/stamps_offer', 'DashboardController@stampsOffer')->name('stamps_offer');
    $router->get('/form', 'DashboardController@bidForm')->name('bid_form');
    $router->get('/results', 'DashboardController@auctionResults')->name('results');

    $router->get('/users', 'DashboardController@showAllUsers')->name('users');
    $router->get('/stamps', 'DashboardController@adminStamps')->name('stamps');
    
    $router->get('/edit_stamp', 'DashboardController@createEditStampView')->name('edit_stamp');
    $router->post('myStampUpdate', array('uses' => 'StampController@update'));

    $router->get('/bids', 'DashboardController@showBids')->name('bids');

    $router->get('/add', 'DashboardController@addStamp')->name('add');
    //$router->get('/stamp_details', 'DashboardController@stampDetails')->name('details');
    $router->get('/make_bid', 'DashboardController@createBidView')->name('make_bid');
    $router->post('myBid', array('uses' => 'DashboardController@createBid'));
});

Route::resources([
    'dashboard' => 'DashboardController',
    'stamp' => 'StampController'
]);