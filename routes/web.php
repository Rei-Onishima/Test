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


//5-3
Route::get('/list', 'ArticleController@showList')->name('list');

//7-5追加分
Route::get('/regist','ArticleController@showRegistForm')->name('regist');

//8-1
Route::post('/regist','ArticleController@registSubmit')->name('submit');