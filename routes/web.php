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
Route::group(['middleware' => ['auth','App\Http\Middleware\AdminMiddleware']], function() {
    Route::get('/songList','jtrendyController@jsongList')->name('songList');
    Route::get('uploadSong', 'jtrendyController@uploads')->name('uploads');
    Route::get('userlist','jtrendyController@userlist')->name('user'); 
    Route::get('/delete/{id}','jtrendyController@songDelete')->name('delete');
    Route::get('/updateSong/{id}','jtrendyController@updatesong')->name('updateSong');
    Route::get('uploadSong/index', array('uses' => 'jtrendyController@cancle', 'as' => 'cancle.index'));
    Route::get('updateSong/{id}', 'jtrendyController@updatesong');
    Route::get('/deleteuser/{id}','jtrendyController@deleteuser')->name('deleteuser');
    Route::post('update/{id}','jtrendyController@updated')->name('update');
});
 Route::group(['middleware'=>['auth']],function(){
    Route::get('popularlist','jtrendyController@pouplarSongList')->name('popularList');
    Route::get('uploadedsong', 'jtrendyController@uploadedsong')->name('uploadedsong');
    Route::get('songcategory','jtrendyController@show')->name('songcategory');
    Route::post('upload','jtrendyController@create');
    Route::any('show','jtrendyController@showSong')->name('showMe');
    Route::get('profile/{id}', 'jtrendyController@profile')->name('profile');
 });

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::post('/search','jtrendyController@songNameSearch')->name('search');
Route::get('loadSong','jtrendyController@loadSong');

Route::get('/popularSong/displayFullVdo/{id}','jtrendyController@displayfullvdolist')->name('displaySong');
Route::get('/like/{id}','jtrendyController@likecount')->name('like');
Route::get('/unlike/{id}','jtrendyController@unlikecount')->name('unlike');

Route::post('/searchsong','jtrendyController@searchtxt')->name('searchsong');
Route::get('test', 'jtrendyController@example')->name('example');

Route::get('loadSong','jtrendyController@loadSong')->name('popular');
Route::get('songlist', 'jtrendyController@songlist')->name('list');//to delete
Route::get('/songlist/detail/{id}', 'jtrendyController@detail')->name('detail');
Route::post('update/{id}','jtrendyController@updated')->name('update');
Route::get('Cancel','jtrendyController@cancle')->name('cancle');
Route::get('memberRegister', 'jtrendyController@userRegister')->name('registeruser');
Route::post('userRegister', 'jtrendyController@userCreate')->name('memberRegister');
                                                
Route::get('userlist','jtrendyController@userlist')->name('user');
Route::get('/deleteuser/{id}','jtrendyController@deleteuser')->name('deleteuser');
Route::get('/userlist/userdetail/{id}', 'jtrendyController@userdetail')->name('userdetail');

Route::post('/comment','jtrendyController@Comment')->name('comment');
