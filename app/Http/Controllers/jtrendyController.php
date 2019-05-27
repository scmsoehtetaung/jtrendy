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

    public function profile($id) {
        $users = DB::table('users')->where('id',$id)->first();
        return view('profile')->with(compact('users'));    
    }    
    public function updatesong($id) {
        $song = DB::table('song')->where('id',$id)->first();
        return view('UpdateSong', compact('song'));  
    }
}