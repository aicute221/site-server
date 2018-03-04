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
    return view('home/index');
});

Route::get('/article/list', 'Home\IndexController@articleList');
Route::get('/article/detail', 'Home\IndexController@articleDetail');
Route::get('/example/list', 'Home\IndexController@exampleList');

Route::get('/admin', 'Admin\AdminLoginController@login');
Route::post('/admin_login', 'Admin\AdminLoginController@postLogin');

Route::middleware(['admin_login'])->group(function(){
    Route::get('/admin/index', function(){
        return view('admin/page');
    });

    Route::get('/admin/articles', function(){
        return view('admin/articles');
    });
    Route::get('/admin/article/{id?}', 'Admin\ArticleController@page');
    Route::post('/admin/add_article', 'Admin\ArticleController@add');

});