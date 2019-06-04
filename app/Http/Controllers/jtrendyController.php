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

    public function songlist() {    //to delete
        $song = DB::table('song')->select('id','title')->get();
        return view('songlist', compact('song'));  
    }

    public function detail($id) {
        $song = DB::table('song')->where('id',$id)->first();
        $max = DB::table('song')->max('song_react_count');
        return view('detail', compact('song','max'));  
    }
}