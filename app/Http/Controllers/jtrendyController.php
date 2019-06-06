<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Html\FormFacade;
use Log;
use DB;
use DateTime;
use Auth;
class jtrendyController extends Controller
{
    public function example() {
        return view('example');
    }
    
    public function updatesong($id) {
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

    public function jsongList()
    {
        $jsongListCompact=DB::table('song')->orderBy('updated_at','asc')->paginate(12);
        $totalCount=DB::table('song')->count();
        return view('SongListBlade',compact('jsongListCompact','totalCount'));
    }

    public function songDelete($id,Request $request)
    {
        $jsongListCompact=DB::table('song')->where('id',$id)->delete();         
        return redirect()->route('songList')->with( 'delete','Successfully deleted!!');
    }

    public function songNameSearch(Request $request)
    {
        $searchSongTitle = $request->input('searchSongTitle');
        $jsongListCompact=DB::table('song')->where('title','LIKE','%'.$searchSongTitle.'%')->paginate(12);
        $totalCount=DB::table('song')->where('title','LIKE','%'.$searchSongTitle.'%')->count();
        if(count($jsongListCompact) > 0)
            {
                return view('SongListBlade',compact('jsongListCompact','totalCount'))->withDetails($jsongListCompact)->withQuery($searchSongTitle);
            }
        else
            {
                return view('SongListBlade',compact('jsongListCompact','totalCount'));
            }
    }

    public function uploads() {
        return view('uploadSong');
    }

    public function cancle(){ 
        return redirect()->route('list'); 
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
        $user = Auth::user();   
        DB::table('song')->insert([
        'title' => $title,
        'category' => $request->category,
        'artist' =>$artist,
        'description' => $request->description,
        'video_path' => $videoName,
        'song_react_count' => '0',
        'song_download_count' => '0',
        'created_user' => $user->id,
        'updated_user' =>$user->id,
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

    public function songlist() {    //to delete
        $song = DB::table('song')->select('id','title')->get();
        return view('songlist', compact('song'));  
    }

    public function detail($id) {
        $song = DB::table('song')->where('id',$id)->first();
        $max = DB::table('song')->max('song_react_count');
        return view('detail', compact('song','max'));  
    }

    public function userlist(){
        $users=DB::table('users')->select('id','name','email')->get();  
        return view('userlist',compact('users'));
    }

    public function deleteuser($id,Request $request)
    {
        DB::table('users')->where('id',$id)->delete();         
        return redirect()->route('user')->with( 'delete','Successfully deleted!!');
    }
    
    public function uploadedsong() {    
        $songs = DB::table('song')->orderBy('created_at', 'DESC')->paginate(6);     
        return view('uploadedsong', compact('songs'));  
    }
    
    public function songNameSearch2(Request $request){
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
