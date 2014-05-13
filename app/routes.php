<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* my test comment */
Route::get('/', function()
{
    return View::make('pages.dashboard');
});
Route::get('data', function()
{
    return View::make('pages.data');
});
Route::get('footer', function()
{
    return View::make('pages.footer');
});
Route::get('headers', function()
{
    return View::make('pages.headers');
});
Route::get('mailings', function()
{
    return View::make('pages.mailings');
});
Route::get('servers', function()
{
    return View::make('pages.servers');
});
Route::get('offers', function()
{
    return View::make('pages.offers');
});

Route::resource('offers', 'OfferController');

Route::resource('users', 'UserController');

Route::post('upload', 'UploadController@upload');

Route::get('upload', function()
{
    return null;
});
