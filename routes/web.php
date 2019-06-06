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
////////////////////////////////////////////////
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/songList','jtrendyController@jsongList')->name('songList');
Route::get('/delete/{id}','jtrendyController@songDelete')->name('delete');
Route::get('/updateSong/{id}','jtrendyController@updatesong')->name('updateSong');
Route::post('/search','jtrendyController@songNameSearch')->name('search');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('uploadedsong', 'jtrendyController@uploadedsong')->name('uploadedsong');
Route::post('/search','jtrendyController@songNameSearch')->name('search');
Route::get('test', 'jtrendyController@example')->name('example');
Route::get('uploadSong', 'jtrendyController@uploads')->name('uploads');
Route::post('upload','jtrendyController@create');
Route::get('uploadSong/index', array('uses' => 'jtrendyController@cancle', 'as' => 'cancle.index'));
Route::get('songTitle','jtrendyController@show')->name('songTitle');
Route::post('show','jtrendyController@showSong')->name('showMe');
Route::get('profile/{id}', 'jtrendyController@profile')->name('profile');
Route::get('updateSong/{id}', 'jtrendyController@updatesong');
Route::get('loadSong','jtrendyController@loadSong');
Route::get('songlist', 'jtrendyController@songlist');//to delete
Route::get('/songlist/detail/{id}', 'jtrendyController@detail')->name('detail');
Route::post('update/{id}','jtrendyController@updated')->name('update');
