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
Route::group(["prefix"=>"admin","namespace"=>"Admin"],function(){

    //后台登陆首页
    Route::get("home","HomeController@index")->name("home");

});

//载入登陆模板
Route::get("/admin","Admin\LoginController@login")->name("login");
//判断用户登陆规则
Route::post("/loginHandle","Admin\LoginController@loginHandle");


Route::get('test', function () {
    return  view("admin.login"); 
});


