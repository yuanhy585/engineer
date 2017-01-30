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
//        Route::resource('orders','OrderController');//你单独写resources是不可以的

        //下面是我写的，一个是添加订单，一个是查看订单,要保持跟请求的href一致
        Route::get('shops/{id}/orders','OrderController@index');//这里的id就是传过来的shop->id
        Route::get('orders/{id}/create','OrderController@create');//这里的id就是传过来的shop->id
        //下面是刚才傻逼地方提交过来的数据
        Route::post('orders/{id}/store','OrderController@store');

        //针对订单进行修改，传的参数应该都是order_id，不再是shop_id
        Route::get('orders/{id}/edit','OrderController@edit');
        Route::get('orders/{id}/material_index','OrderController@materialIndex');
        Route::get('orders/{id}/material_add','OrderController@materialAdd');
        Route::post('orders/{id}/material_store','OrderController@materialStore');
        Route::post('orders/{id}/update','OrderController@update');
        //material_order operation
        Route::get('material_order/{id}/edit', 'OrderController@materialEdit');
        Route::post('materialOrder/{id}/update','OrderController@materialUpdate');
        Route::get('material_order/{id}/delete','OrderController@materialDelete');

        //管理部人员对销售部人力资源进行管理
        Route::resource('user/sale','SaleController');
        Route::post('user/sale/{id}/update','SaleController@update');
        Route::get('user/sale/{id}/delete','SaleController@destroy');
        Route::get('mySale','SaleController@saleIndex');

        Route::get('dmOrders/all','SaleController@all');
        Route::get('dmOrders/order_in_censor','SaleController@censor');
        Route::get('dmOrders/order_censored','SaleController@censored');
        Route::get('dmOrders/order_failed','SaleController@fail');

        //route for province data import
        Route::get('province','ImportController@provinceImport');
        Route::post('province/data_import','ImportController@provinceReceive');

        //route for material data import
        Route::get('material','ImportController@materialImport');
        Route::post('material/data_import','ImportController@materialReceive');

        //route for status data import
        Route::get('status','ImportController@statusImport');
        Route::post('status/data_import','ImportController@statusReceive');


        Route::post('ajax/province_city','ShopController@ajxPC');
        Route::post('ajax/type_name','OrderController@ajaxTN');

    });
});

//API 不能放在language中间件里
Route::group(['prefix'=>'api'],function (){
    Route::get('userList','UserAPIController@getUserList');
});





