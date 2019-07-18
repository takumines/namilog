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


Route::get('/spot/create', 'SpotController@add')->name('spot.create');
Route::post('/spot/create', 'SpotController@create');
Route::get('/spot/edit/{id}', 'SpotController@edit')->name('spot.edit');
Route::post('/spot/edit/{id}', 'SpotController@update');
Route::get('/spot/{id}', 'SpotController@show')->name('spot.show');
