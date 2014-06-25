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
Route::get('/', function () {
    return View::make('home.index');
});
Route::get('/work', function () {
    return View::make('home.work');
});
Route::get('/contact', function () {
    return View::make('home.contact');
});


Route::get('login', array('uses' => 'LoginController@showLogin'));

Route::post('login', array('uses' => 'LoginController@doLogin'));

Route::get('logout', array('uses' => "LoginController@doLogout"));



Route::group(array('before' => 'auth'), function () {

    Route::get('data', function () {
        return View::make('pages.data');
    });
    Route::get('footer', function () {
        return View::make('pages.footer');
    });
    Route::get('headers', function () {
        return View::make('pages.headers');
    });
    Route::get('mailings', function () {
        return View::make('pages.mailings');
    });
    Route::get('servers', function () {
        return View::make('pages.servers');
    });
    Route::get('offers', function () {
        return View::make('pages.offers');
    });

    Route::resource('offers', 'OfferController');

    Route::group(array('before' => 'role'), function () {
        Route::resource('users', 'UserController');
    });

    Route::post('upload', 'UploadController@upload');

    Route::get('upload', function () {
        return null;
    });
});