<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/user/reg','User\UserController@reg');     //注册
Route::post('/api/user/login','User\UserController@login'); // 登录
Route::get('/api/show/time','User\UserController@showTime'); // 获取数据
Route::post('/api/auth','User\UserController@auth'); // 鉴权


###############################################################################################
//2月6日  签名测试
Route::get('/test/check','TestController@md5Check');    //验签
Route::post('/test/check1','TestController@md5Check1');     //POST验签
Route::get('/test/check2','TestController@md5Check2');    //密钥验签
Route::get('/test/decrypt','TestController@decrypt');      //对称解密

###############################################################################################