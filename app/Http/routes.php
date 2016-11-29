<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



//添加后台群组路由
Route::group(["prefix"=>"admin","namespace"=>"Admin","middleware"=>"loginAuth"],function(){

    //后台登陆首页
    Route::get("home","HomeController@index")->name("home");
    //显示展品
    Route::get("goods","GoodsController@show")->name("goods");
    //添加展品
    Route::get("addGoods","GoodsController@addGoods");
    //保存展品
    Route::post("store","GoodsController@store");
     //编辑展品
    Route::get("updateGood/{id}","GoodsController@updateGood")
     ->where(['id' => '[0-9]+']);
    //  编辑展品
     Route::post("editGood/{id}","GoodsController@editGood")
     ->where(['id' => '[0-9]+']);
     //删除展品
    Route::get("delGood/{id}","GoodsController@delGood")
    ->where(['id' => '[0-9]+']);



    // -----------------------------------------------------------
    Route::get("exhibit/goods/{id}","ProjectController@goods")->name("admin.exhibit.goods")
    ->where(['id' => '[0-9]+']);
    // 添加展品到展览的显示模版
    Route::get("exhibit/addGoods/{id}","ProjectController@addGoods")->name("admin.exhibit.addGoods")
    ->where(['id' => '[0-9]+']);
    // 添加展品到展览的action动作
    Route::get("exhibit/actionRemoveGoods/{id}/{exhibit}","ProjectController@actionRemoveGoods")
    ->name("admin.exhibit.actionRemoveGoods")
    ->where(['id' => '[0-9]+'],['exhibit' => '[0-9]+']);

    // 移除展品到展览的action动作
    Route::get("exhibit/actionAddGoods/{id}/{exhibit}","ProjectController@actionAddGoods")
    ->name("admin.exhibit.actionAddGoods")
    ->where(['id' => '[0-9]+'],['exhibit' => '[0-9]+']);

    // 展览资源路由
    Route::resource("exhibit","ProjectController");

    // 点位资源路由
    Route::resource("poi","PoiController");

    // 用户配置资源路由
    Route::resource("config","ConfigController");

    // 用户统计资源路由
    Route::resource("statistics","StatisticsController");



    // 用户上传文件
    Route::any("uploader","BaseController@fileUploader");

    //云数据存储
    Route::get('cloud', "BaseController@resource_upload");



});

//载入登陆模板
Route::get("/admin","Admin\LoginController@login")->name("login");
//判断用户登陆规则
Route::post("/loginHandle","Admin\LoginController@loginHandle");
//判断用户登陆规则
Route::get("/loginout","Admin\LoginController@loginout");


Route::get('test', "Admin\BaseController@resource_upload");


