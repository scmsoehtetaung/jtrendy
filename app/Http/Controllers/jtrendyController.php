<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Html\FormFacade;
use Illuminate\Support\Facades\Validator;
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
        $title=$request->title;
        $artist=$request->artist;
        $exist =DB::table('song')->where('title',$title)->where('artist',$artist)->where('id','!=',$id)->count();
        if($exist>0){
            return redirect()->back()->withInput($request->input())->with('alreadyExist', 'The updated song is already exist');
        }
        $user = Auth::user();   
         DB::Table('song')->where('id',$id)->update([
        'title' => $request->title,
        'artist' =>$request->artist ,
        'category' => $request->category,
        'description' => $request->description,
        'video_path' => $videoName,
        'video_size'=> $request->video_size,
        'updated_user' =>$user->id,
        'updated_at' => $now,
        ]);
        return redirect()->route('songList')->with( 'message','Song Updated!'); 
       
    }

    public function jsongList()
    {
        $jsongListCompact=DB::table('song')->orderBy('updated_at','desc')->paginate(5);
        $totalCount=DB::table('song')->count();
        $song="list";
        return view('SongListBlade',compact('jsongListCompact','totalCount','song'));
    }

    public function songDelete($id,Request $request)
    {
        $jsongListCompact=DB::table('song')->where('id',$id)->first();
        $vdoDel=$jsongListCompact->video_path;
        if(file_exists(public_path('videos/'.$vdoDel))){
        unlink(public_path('videos/'.$vdoDel));
        }
        $jsongListCompact=DB::table('song')->where('id',$id)->delete();         
        return redirect()->route('songList')->with( 'delete','Song has been deleted successfully!!');
    }

    public function multiDelete(Request $request)
    {
        $multiDel_id=$request->input('multiDel_id');
        $jsongListCompact=DB::table('song')->where('id',$multiDel_id)->first();
        $vdoDel=$jsongListCompact->video_path;
        if(file_exists(public_path('videos/'.$vdoDel))){
        unlink(public_path('videos/'.$vdoDel));
        }
        $jsongListCompact=DB::table('song')->whereIn('id',$multiDel_id)->delete();
        return redirect()->route('songList')->with( 'del','Selected songs have been deleted successfully!!');
    }

    public function songNameSearch(Request $request)
    {
        $searchSongTitle = $request->input('searchSongTitle');
        $jsongListCompact=DB::table('song')->where('title','LIKE','%'.$searchSongTitle.'%')->paginate(5);
        $totalCount=DB::table('song')->where('title','LIKE','%'.$searchSongTitle.'%')->count();
        $song="search";
        return view('SongListBlade',compact('jsongListCompact','totalCount','song'));
    }
    

    public function uploads() {
        return view('uploadSong');
    }

    public function cancle(){ 
        return redirect()->route('songList'); 
    }

    public function create(Request $request){
        $request->validate([
        'title'=>'required',
        'artist'=>'required',
        'category'=>'required',
        'description'=>'required',
        ]);   
        $now = new DateTime();
        $video=$request->file('myVideo');
            if($request->hasFile('myVideo')){ 
                $title=$request->title;
                $artist=$request->artist;
                $song01 =DB::table('song')->where('title',$title)->first();
                $song02=DB::table('song')->where('artist',$artist)->first();
                $videoName= $request->file('myVideo')->getClientOriginalName();
                $file_size=$request->file('myVideo')->getClientSize();
                $size=number_format($file_size / 1048576,2);
                    if( $size>80){
                        return redirect()->back()->with('videoRequired', 'Cant Upload! Your video is too large');
                    }
                    if($song01 && $song02)
                    {
                        return redirect()->back()->withInput($request->input())->with('videoRequired', 'The uploaded song is already exist');
                    }
                $video->move(public_path().'/videos/', $videoName);  
            }
            else{
                return redirect()->back()->withInput($request->input())->with('videoRequired', 'Song Not selected');
            } 
        $user = Auth::user();   
        DB::table('song')->insert([
        'title' => $title,
        'category' => $request->category,
        'artist' =>$artist,
        'description' => $request->description,
        'video_path' => $videoName,
        'video_size'=> $size."MB",
        'song_react_count' => '0',
        'song_download_count' => '0',
        'created_user' => $user->id,
        'updated_user' =>$user->id,
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        return redirect()->route('songList')->with('complete', 'Song was Uploaded!');  
    }

    public function show(){
        $counttotal = DB::table('song')->count();
        $type="pop";
        $shows=[];
        $count = DB::table('song')->where('category', $type)->count();
        $shows = DB::table('song')->where('category', $type)->paginate(6);
        return view('songCategoryList')->with(compact('count','shows','type','counttotal'));    
      }

    public function showSong(Request $request){
        $counttotal = DB::table('song')->count();
        $type=$request->input('category');
        $count=0;
        $shows=[];
        $count = DB::table('song')->where('category', $type)->count();
        $shows = DB::table('song')->where('category', $type)->paginate(6);
     return view('songCategoryList')->with(compact('count','shows','type','counttotal'));
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

    public function pouplarSongList(){
        $popular = DB::table('song')->where('song_react_count','>',0)->orderBy('song_react_count','desc')->take(6)->get();
        return view('popularSong',compact('popular'));
    }

    public function displayfullvdolist($id,Request $request){
        $popular =DB::table('song')->where('id',$id)->first(); 
        $likedcolor=DB::table('liked_song')->where('song_id',$id)->where('user_id',Auth::user()->id)->get();
        $categories= DB::table('song')->where('category',$popular->category)->where('id','!=',$popular->id)->paginate(3);
        $commentdisplay=DB::table('comment')->where('song_id',$id)->orderBy('updated_at','desc')->get();
        return view('displayFullVdo',compact('popular','categories','commentdisplay','likedcolor'));
    }
    
    public function likecount($id,Request $request){
        $like=DB::table('song')->where('id',$id)->increment('song_react_count');
        $likecount=DB::table('liked_song')->insert([
        'user_id'=> Auth::user()->id,
        'song_id'=>$id,
        ]);
    }
   
    public function unlikecount($id){
        $unlike=DB::table('song')->where('id',$id)->decrement('song_react_count');
      $user=Auth::user()->id;
        $unlikecount=DB::table('liked_song')->where('song_id',$id)
        ->where('user_id',$user)->delete();
    }
    public function userRegister() {
        return view('registeruser');
    }
    
    public function userCreate(Request $request){
      
        $now=new DateTime();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|min:10|regex:/^(([+]959)?(09)?)[0-9]{8,9}$/',
            'email' => 'required|string|email|max:255|regex:/^\S+@gmail.com$/|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $phone=$request->phone_number%1000000000;
        $phones =DB::table('users')->where('phone_number','LIKE', "%{$phone}")->count();
        if($phones>0){
            return redirect()->back()->withInput($request->input())->with('phone', 'The phone number has already been taken.');
        }
        $user = Auth::user();   
        DB::table('users')->insert([
            'name'=> $request->get('name'),
            'user_type'=> $request->get('user_type'),
            'phone_number'=>$request->get('phone_number'),
            'email'=> $request->get('email'),
            'password'=>bcrypt($request->get('password')),
            'created_user'=>$user->id,
            'updated_user'=>$user->id,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        return redirect()->back()->with('message','Successfully Registered'); 
    }
   
    public function userlist(){
        $users=DB::table('users')->where('id', '!=', auth()->id())
                                ->orderBy('user_type','asc')
                                ->orderBy('id','desc')
                                ->paginate(5);
        return view('userlist',compact('users'));
    }
    public function searchUser(Request $request){
        $searchUser=$request->input('searchUser');
        $users=DB::table('users')->where('name','LIKE','%'.$searchUser.'%')->paginate(5); 
        return view('userlist',compact('users'));
    }

    public function userdetail($id) {
        $users = DB::table('users')->where('id',$id)->first();
        
        return view('userdetail', compact('users'));  
    }

    public function deleteuser($id,Request $request)
    {
        DB::table('users')->where('id',$id)->delete();         
        return redirect()->route('user')->with( 'delete','Successfully deleted!!');
    }
    
    public function uploadedsong() {    
        $songs = DB::table('song')->orderBy('created_at', 'DESC')->paginate(6);   
        $test="upload";  
        return view('uploadedsong', compact('songs','test'));
    }

    public function searchtxt(Request $request){
        $searchtxt = $request->input('searchtxt');
        $test="search";
        $songs=DB::table('song')->where('title','LIKE','%'.$searchtxt.'%')->paginate(6);
        return view('uploadedsong',compact('songs','test'));
    }
     
    public function Comment(Request $request){
        $user = Auth::user();   
        $now=new DateTime();
        $commentletter=DB::table('comment')->insert([
        'song_id'=>$request->c,
        'created_user'=> $user->id,
        'updated_user'=> $user->id,
        'comment'=> $request->commentwrite,
        'created_at'=> $now,
        'updated_at'=> $now,
        ]);
        return redirect()->back();
    }

    public function userupdate($id) {
        $users = DB::table('users')->where('id',$id)->first();
        return view('userupdate', compact('users'));  
    }

    public function updateur($id,Request $request) {     
        $this->validate($request, [          
            'email' => 'required|string|email',
            'phone_number' => 'required|min:10|regex:/^(([+]959)?(09)?)[0-9]{8,9}$/',         
        ]);
       
        $now = new DateTime();
        $email=$request->email;
        $phone_number=$request->phone_number%100000000;
        $password_confirmations=$request->password_confirmation;
            
        $user =DB::table('users')->where('email',$email)->where('id','!=',$id)->count();
        $phone =DB::table('users')->where('phone_number','LIKE', "%{$phone_number}")->where('id','!=',$id)->count();
        
        if(  $password=$request->password){
            $this->validate($request, [ 
            'password' => 'min:6',
            'password_confirmation' => 'required',
            ]);

            DB::Table('users')->where('id',$id)->update([
                'password' => bcrypt($password),
            ]);
        }

        if(  $password_confirmations!=$password){
            return redirect()->back()->withInput($request->input())->with('password', 'Password confimation shoud be match');        
        } 
       
        if($user>0){
            return redirect()->back()->withInput($request->input())->with('alreadyExists', 'Email is already exist');
        }

        if($phone>0){
            return redirect()->back()->withInput($request->input())->with('alreadyExist', 'PhoneNumber is already exist');
        }

        $user = Auth::user(); 
        DB::Table('users')->where('id',$id)->update([
        'name'=>$request->get('name'),
        'phone_number'=>$request->get('phone_number'),
        'email'=>$request->get('email'),
        'gender'=>$request->get('gender'),
        'updated_at' => $now,
        ]);
        
        return redirect()->route('user')->with('message','User Updated!'); 
    }
    
    public function back(){ 
        return redirect()->route('user'); 
    }
}
    
