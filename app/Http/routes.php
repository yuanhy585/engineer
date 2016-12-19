<?php


Route::group(['middleware'=>'language'],function(){

    Route::auth();

    Route::group(['middleware'=>'auth'],function(){

        Route::get('/', 'HomeController@index');

        Route::resource('users','UserController');

    });

});



