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


Route::get('updateSong/{id}', 'jtrendyController@updatesong');
Route::get('test', 'jtrendyController@example')->name('example');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('loadSong','jtrendyController@loadSong');
Route::get('songlist', 'jtrendyController@songlist');//to delete
Route::get('/songlist/detail/{id}', 'jtrendyController@detail')->name('detail');
