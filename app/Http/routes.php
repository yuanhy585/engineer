<?php


Route::group(['middleware'=>'language'],function(){

    Route::auth();

    Route::group(['middleware'=>'auth'],function(){

        Route::get('/', 'HomeController@index');

        //routes for users
        Route::resource('users','UserController');
        Route::get('users/{id}/update','UserController@update');
        Route::get('users/{id}/delete','UserController@destroy');

        //routes for shops
        Route::resource('/shops','ShopController');

    });
});

//API
Route::group(['prefix'=>'api'],function (){
    Route::get('userList','UserAPIController@getUserList');
});





