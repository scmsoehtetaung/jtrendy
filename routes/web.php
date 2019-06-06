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
Route::get('popularlist','jtrendyController@pouplarSongList')->name('popularList');
Route::get('/popularSong/displayFullVdo/{id}','jtrendyController@displayfullvdolist')->name('displaySong');
Route::get('/like/{id}','jtrendyController@likecount')->name('like');
Route::get('/unlike/{id}','jtrendyController@unlikecount')->name('unlike');