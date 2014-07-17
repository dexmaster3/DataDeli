<?php

Route::get('/', function () {
    return View::make('static.index');
});
Route::get('/work', function () {
    return View::make('static.work');
});
Route::get('/contact', function () {
    return View::make('static.contact');
});

Route::get('login', array('uses' => 'LoginController@showLogin'));
Route::post('login', array('uses' => 'LoginController@doLogin'));
Route::get('logout', array('uses' => "LoginController@doLogout"));
Route::get('register', 'HomeController@showRegister');
Route::post('register', 'HomeController@sendRegister');
Route::get('activate/{id}/{activate}', 'HomeController@activateAccount');
Route::get('resend/{id}', 'HomeController@resendActivation');
Route::post('contactinfo', 'HomeController@contactInfo');
Route::get('ventrilo', 'VentriloController@ventrilo');
Route::get('ventupdate/{key}', 'VentriloController@grabComments');


Route::group(array('before' => 'auth|activated|contact'), function ()
{
    Route::group(array('prefix' => 'listing'), function(){
        Route::get('{topic}', 'ListingController@search');
    });
    Route::get('files', 'FileController@index');
    Route::group(array('prefix' => 'files'), function(){
        Route::post('upload', 'FileController@upload');
        Route::get('list', 'FileController@listing');
        Route::get('test/{userId}/{fileId}', 'FileController@makeVisible');
    });

    Route::group(array('prefix' => 'users'), function () {
        Route::get('profile', 'UserController@profile');
        Route::get('list', 'UserController@listing');
    });
    Route::resource('users', 'UserController');
    Route::post('userProfilePost', 'UserController@userProfilePost');
    Route::post('userProfileComment', 'UserController@userProfileComment');
    Route::delete('deletePosting', 'UserController@deletePosting');
});