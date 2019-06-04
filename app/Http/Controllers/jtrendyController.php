<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Log;
use DB;
use DateTime;
class jtrendyController extends Controller
{
    public function example() {
        Log::info("ENTER TO LOG");
        return view('example');
    }
    
    public function updatesong($id,Request $request) {
        $song = DB::table('song')->where('id',$id)->first();
        return view('UpdateSong', compact('song'));  
    }
    
    public function updated($id,Request $request) {
        $song = DB::table('song')->where('id',$id)->first();
        $now = new DateTime();
      
        $video=$request->file('myVideo');
        $oldvideo=$song->video_path;
    if($request->hasFile('myVideo')){
        if(file_exists(public_path('videos/'.$oldvideo))){
           unlink(public_path('videos/'.$oldvideo));
        }
        $videoName= $request->file('myVideo')->getClientOriginalName();
        $video->move(public_path().'/videos/', $videoName);  
        }
    else{
        $videoName=$song->video_path;
        $request->video_size=$song->video_size;
        }
         DB::Table('song')->where('id',$id)->update([
        'title' => $request->title,
        'artist' =>$request->artist ,
        'category' => $request->category,
        'description' => $request->description,
        'video_path' => $videoName,
        'video_size'=> $request->video_size,
        'updated_at' => $now,
        ]);
        return redirect()->back()->with('message','File Updated'); 
}
}
