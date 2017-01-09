<?php


Route::group(['middleware'=>'language'],function(){

    Route::auth();

    Route::group(['middleware'=>'auth'],function(){

        Route::get('/', 'HomeController@index');

        //routes for users
        Route::resource('users','UserController');
        Route::post('users/{id}/update','UserController@update');
        Route::get('users/{id}/delete','UserController@destroy');

        //routes for shops
        Route::resource('shops','ShopController');
        Route::post('shops/{id}/update','ShopController@update');
        Route::get('myshop','ShopController@myShop');

        //routes for order_check from department 5
        Route::resource('order_check','OrderCheckController');

        //routes for materials
        Route::resource('materials','MaterialController');
        Route::get('materials/{id}/edit','MaterialController@edit');
        Route::post('materials/{id}/update','MaterialController@update');
        Route::get('materials/{id}/delete','MaterialController@destroy');

        //routes for orders 2017.01.08 problem
        Route::resource('orders','OrderController');


        

        //route for province data import
        Route::get('province','ImportController@provinceImport');
        Route::post('province/data_import','ImportController@provinceReceive');

        //route for material data import
        Route::get('material','ImportController@materialImport');
        Route::post('material/data_import','ImportController@materialReceive');

        //route for status data import
        Route::get('status','ImportController@statusImport');
        Route::post('status/data_import','ImportController@statusReceive');


        Route::post('ajax/province','ShopController@ajxProvince');
        Route::post('ajax/province_city_correlation','ShopController@ajxCorrelation');
        Route::post('ajax/province_city','ShopController@ajxPC');
        Route::post('ajax/province_city_correspondence','ShopController@ajxCorrespondence');

    });
});

//API
Route::group(['prefix'=>'api'],function (){
    Route::get('userList','UserAPIController@getUserList');
});





