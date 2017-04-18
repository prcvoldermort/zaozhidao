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

//user端入口html
Route::get('/index',function () {
   return view('index');
});

//admin端入口html
Route::get('/admin',function () {
    return view('admin');
});

// mailgun测试路由
Route::get('/testMailgun','MailController@testMailgun');

// 发送邮件测试路由
Route::get('/testSendmail','MailController@testSendmail');

// 接收邮件测试路由
Route::get('/testReceivemail','MailController@testReceivemail');

// ProjectController相关路由
Route::get('/project/getOneDetail','ProjectController@getOneDetail');
Route::get('/project/getAll','ProjectController@getAll');
Route::get('/project/getMapBackendData','ProjectController@getMapBackendData');
Route::post('/project/createNewProject','ProjectController@createNew');