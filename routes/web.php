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
Route::get('/', function() {
  return view('welcome');
});

/* home */
Route::get('/start', 'StartController@index')->name('start');
Route::get('/start/create', 'StartController@add')->name('start.create');
Route::post('/start/create', 'StartController@create');
// Route::
/* spot */
Route::get('/spot/create', 'SpotController@add')->name('spot.create');
Route::post('/spot/create', 'SpotController@create');
Route::get('/spot/edit/{id}', 'SpotController@edit')->name('spot.edit');
Route::post('/spot/edit/{id}', 'SpotController@update');
Route::get('/spot/{id}', 'SpotController@show')->name('spot.show');
/* diary */
Route::get('/timeline', 'Diarycontroller@index')->name('diary.index');
Route::get('/diary/index', 'DiaryController@index');
Route::get('/diary/create', 'DiaryController@add')->name('diary.create');
Route::post('/diary/create', 'DiaryController@create');
Route::get('/diary/edit/{id}', 'DiaryController@edit')->name('diary.edit');
Route::post('/diary/edit/{id}', 'DiaryController@update');
Route::get('diary/{id}', 'Diarycontroller@show')->name('diary.show');
