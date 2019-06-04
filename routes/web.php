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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/songList','jtrendyController@jsongList')->name('songList');
Route::get('/delete/{id}','jtrendyController@songDelete')->name('delete');
Route::get('/updateSong/{id}','jtrendyController@songUpdate')->name('updateSong');
Route::post('/search','jtrendyController@songNameSearch')->name('search');


Route::get('test', 'jtrendyController@example')->name('example');