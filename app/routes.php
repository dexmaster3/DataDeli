<?php

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
Route::get('register', 'HomeController@showRegister');



Route::group(array('before' => 'auth'), function () {

    Route::resource('offers', 'OfferController');

    Route::group(array('prefix' => 'users'), function () {
        Route::get('profile', 'UserController@profile');
    });
    Route::resource('users', 'UserController');
    Route::post('userProfilePost', 'UserController@userProfilePost');
    Route::post('userProfileComment', 'UserController@userProfileComment');
    Route::delete('deletePosting', 'UserController@deletePosting');

    Route::post('upload', 'UploadController@upload');

    Route::get('upload', function () {
        return null;
    });
});