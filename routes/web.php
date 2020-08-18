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
  Route::get('/spot/create', 'SpotController@create')->name('spot.create');
  Route::post('/spot/create', 'SpotController@store');
  Route::get('/spot/edit/{spot}', 'SpotController@edit')->name('spot.edit');
  Route::post('/spot/edit/{spot}', 'SpotController@update');
  Route::get('/spot/{spot}', 'SpotController@show')->name('spot.show');
  /* diary */
  Route::get('/diary/list', 'Diarycontroller@list')->name('diary.list');
  Route::get('/diary/create', 'DiaryController@create')->name('diary.create');
  Route::post('/diary/create', 'DiaryController@store');
  Route::get('/diary/{diary}', 'DiaryController@show')->name('diary.show');
  Route::get('/diary/edit/{diary}', 'DiaryController@edit')->name('diary.edit');
  Route::post('/diary/edit/{diary}', 'DiaryController@update');
  Route::post('/diary/del/{diary}', 'DiaryController@delete')->name('diary.delete');
  /* user */
  Route::get('/user/list', 'UserController@list')->name('user.list');
  Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
  Route::post('/user/edit/{id}', 'UserController@update');
  Route::get('/user/{id}', 'UserController@show')->name('user.show');
  /* comments */
  Route::post('/comment', 'CommentController@create')->name('comment.create');
  Route::post('/comment/del', 'CommentController@delete')->name('comment.delete');
});

/* twitter */
Route::get('login/twitter', 'Auth\LoginController@redirectToTwitterProvider')->name('twitter.login');
Route::get('login/twitter/callback', 'Auth\LoginController@handleTwitterProviderCallback');