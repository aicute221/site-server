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
Route::get('/example/page/{name}', 'Home\IndexController@example');
Route::get('/article/list', 'Home\IndexController@articleList');
Route::get('/article/page/{id}', 'Home\IndexController@articleDetailPage');
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

    Route::get('/admin/examples', function(){
        return view('admin/examples');
    });

    Route::post('/admin/add_example', 'Admin\ExampleController@add');
    Route::get('/admin/example/{id?}', 'Admin\ExampleController@page');
    Route::get('/admin/example_json', 'Admin\ExampleController@detail');

});