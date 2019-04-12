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
    $router->get('/results', 'DashboardController@auctionResults')->name('results');

    $router->get('/users', 'DashboardController@showAllUsers')->name('users');
    $router->get('/stamps', 'DashboardController@createAdminStampsView')->name('stamps');
    
    $router->get('/stamps/create', 'StampController@create')->name('/stamps/create');
    $router->get('/stamps/{id}/edit', 'StampController@edit')->name('edit_stamp');
    $router->post('updateStamp', array('uses' => 'StampController@update'));
    $router->get('/stamps/offer', 'StampController@index')->name('stamps/offer');
    $router->post('deleteStamp', array('uses' => 'StampController@destroy'));

    $router->get('/bid/{id}/show', 'BidController@show')->name('make_bid');
    $router->get('/bids', 'BidController@index')->name('bids');
    $router->get('/form', 'DashboardController@bidForm')->name('bid_form');
    $router->post('createBid', array('uses' => 'DashboardController@createBid'));
});

Route::resources([
    'stamp' => 'StampController',
    'bid' => 'BidController'
]);