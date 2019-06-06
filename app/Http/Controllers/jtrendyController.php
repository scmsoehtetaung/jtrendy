<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Log;
use DB;
class jtrendyController extends Controller
{
    public function example() {
        Log::info("ENTER TO LOG");
        return view('example');
    }

    public function loadSong() {
        return view('popularSong');
    }

    public function updatesong($id) {
        $song = DB::table('song')->where('id',$id)->first();
        return view('UpdateSong', compact('song'));  
    }

    public function pouplarSongList(){
        $popular = DB::table('song')->orderBy('song_react_count','desc')->take(6)->get();
        return view('popularSong',compact('popular'));
    }

    public function displayfullvdolist($id){
        $popular =DB::table('song')->where('id',$id)->first();         
        $categories= DB::table('song')->where('category',$popular->category)->get();
        return view('displayFullVdo',compact('popular','categories'));
    }
    
    public function likecount($id){
        $like=DB::table('song')->where('id',$id)->increment('song_react_count');
    }
   
    public function unlikecount($id){
        $unlike=DB::table('song')->where('id',$id)->decrement('song_react_count');
    }
}