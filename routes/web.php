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
Route::get('/', 'StartController@home')->name('start.home');

/* Auth */
Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
  /* spot */
  Route::get('/spot/create', 'SpotController@add')->name('spot.create');
  Route::post('/spot/create', 'SpotController@create');
  Route::get('/spot/edit/{id}', 'SpotController@edit')->name('spot.edit');
  Route::post('/spot/edit/{id}', 'SpotController@update');
  Route::get('/spot/{id}', 'SpotController@show')->name('spot.show');
  /* diary */
  Route::get('/diary/list', 'Diarycontroller@list')->name('diary.list');
  Route::get('/diary/create', 'DiaryController@add')->name('diary.create');
  Route::post('/diary/create', 'DiaryController@create');
  Route::get('/diary/edit/{id}', 'DiaryController@edit')->name('diary.edit');
  Route::post('/diary/edit/{id}', 'DiaryController@update');
  Route::get('/diary/{id}', 'DiaryController@show')->name('diary.show');
  Route::post('/diary/del/{id}', 'DiaryController@delete')->name('diary.delete');
  /* user */
  Route::get('/user/list', 'UserController@list')->name('user.list');
  Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
  Route::post('/user/edit/{id}', 'UserController@update');
  Route::get('/user/{id}', 'UserController@show')->name('user.show');
  /* comments */
  Route::post('/comment', 'CommentController@create')->name('comment.create');
  Route::post('/comment/del', 'CommentController@delete')->name('comment.delete');
});