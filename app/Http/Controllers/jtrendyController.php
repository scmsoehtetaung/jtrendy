<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use DB;
class jtrendyController extends Controller
{
    public function example() {
        Log::info("ENTER TO LOG");
        return view('example');
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

    public function uploadedsong() {    
        $songs = DB::table('song')->orderBy('created_at', 'DESC')->paginate(6);     
        return view('uploadedsong', compact('songs'));  
    }
    
    public function songNameSearch(Request $request){
        $searchSongTitle = $request->input('searchSongTitle');
        $songs=DB::table('song')->where('title','LIKE','%'.$searchSongTitle.'%')->paginate(6);
        
       if(count($songs) > 0)
        {
               return view('uploadedsong',compact('songs'))->withDetails($songs)->withQuery($searchSongTitle);
            }
            
       else
           {
               return view('uploadedsong',compact('songs'));
            }
    }
}