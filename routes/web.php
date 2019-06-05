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
    return redirect(route('login'));
});

////////////////////////////////////////////////

Route::get('test', 'jtrendyController@example')->name('example');
Route::get('uploadSong', 'jtrendyController@uploads')->name('uploads');
Route::post('upload','jtrendyController@create');
Route::get('uploadSong/index', array('uses' => 'jtrendyController@cancle', 'as' => 'cancle.index'));
Route::get('songTitle','jtrendyController@show')->name('songtitle');
Route::post('show','jtrendyController@showSong')->name('showMe');

Route::get('updateSong/{id}', 'jtrendyController@updatesong');
Route::get('test', 'jtrendyController@example')->name('example');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('loadSong','jtrendyController@loadSong')->name('popular');
Route::get('songlist', 'jtrendyController@songlist')->name('list');//to delete
Route::get('/songlist/detail/{id}', 'jtrendyController@detail')->name('detail');
