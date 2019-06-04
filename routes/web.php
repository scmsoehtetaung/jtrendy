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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
////////////////////////////////////////////////

Route::get('test', 'jtrendyController@example')->name('example');
Route::get('uploadSong', 'jtrendyController@uploads')->name('uploads');
Route::post('upload','jtrendyController@create');
Route::get('uploadSong/index', array('uses' => 'jtrendyController@cancle', 'as' => 'cancle.index'));
Route::get('songTitle','jtrendyController@show')->name('songTitle');
Route::post('show','jtrendyController@showSong')->name('showMe');