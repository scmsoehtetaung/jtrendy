<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use DB;
use DateTime;

class jtrendyController extends Controller
{
    public function example() {
        return view('example');
    }

    public function uploads() {
        return view('uploadSong');
    }

    public function cancle(){
        $song = DB::table('song')->select('id','title')->get();
        return view('songlist', compact('song'));  
    }

    public function create(Request $request){
        $request->validate([
        'title'=>'required',
        'artist'=>'required',
        'category'=>'required',
        'description'=>'required',
        ]);   
        $now = new DateTime();
        $title=$request->title;
        $artist=$request->artist;
        $song01 =DB::table('song')->where('title',$title)->first();
        $song02=DB::table('song')->where('artist',$artist)->first();
        if($song01 && $song02)
        {
            return redirect()->back()->with('videoRequired', 'The uploaded song is already exist');
        }
        $video=$request->file('myVideo');
            if($request->hasFile('myVideo')){
                $videoName= $request->file('myVideo')->getClientOriginalName();
                $file_size=$request->file('myVideo')->getClientSize();
                    if( number_format($file_size / 1048576,2)>80){
                        return redirect()->back()->with('videoRequired', 'Cant Upload! Your video is too large');
                    }
                $video->move(public_path().'/video/', $videoName);  
            }
            else{
                return redirect()->back()->with('videoRequired', 'File Not selected');
            } 
        DB::table('song')->insert([
        'title' => $title,
        'category' => $request->category,
        'artist' =>$artist,
        'description' => $request->description,
        'video_path' => $videoName,
        'song_react_count' => '0',
        'song_download_count' => '0',
        'created_user' => '1',
        'updated_user' => '1',
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        //return redirect()->route('example')->with('status', 'Song was Uploaded!');
        return redirect()->back()->with('complete', 'Song was Uploaded!');  
    }

    public function show(){
        $counts = DB::table('song')->count();
        return view('songCategoryList',compact('counts'));    
      }

    public function showSong(Request $request){
        $type=$request->input('category');
        $count=0;
        $shows=[];
        if($type=="pop"){
           $count = DB::table('song')->where('category', 'pop')->count();
           $shows = DB::table('song')->where('category', 'pop')->get();
        }
        if($type=="rock"){
           $count = DB::table('song')->where('category', 'rock')->count();
           $shows = DB::table('song')->where('category', 'rock')->get();
        }
        if($type=="hiphot"){
           $count = DB::table('song')->where('category', 'hiphot')->count();
           $shows = DB::table('song')->where('category', 'hiphot')->get();
        }
        if($type=="classic"){
           $count = DB::table('song')->where('category', 'classic')->count();
           $shows = DB::table('song')->where('category', 'classic')->get();
        }
        if($type=="ost"){
           $count = DB::table('song')->where('category', 'ost')->count();
           $shows = DB::table('song')->where('category', 'ost')->get();
        }
        if($type=="covered"){
           $count = DB::table('song')->where('category', 'covered')->count();
           $shows = DB::table('song')->where('category', 'covered')->get();
        }
     return redirect()->route('songtitle')->with(compact('count','shows','type'));
     }

    public function profile($id) {
        $users = DB::table('users')->where('id',$id)->first();
        return view('profile')->with(compact('users'));    
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