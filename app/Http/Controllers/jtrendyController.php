<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Html\FormFacade;
use Illuminate\Support\Facades\DB;

use Log;

class jtrendyController extends Controller
{
    public function example() {
        Log::info("ENTER TO LOG");
        return view('example');
    }
   
    public function jsongList()
    {
        $jsongListCompact=DB::table('song')->orderBy('Posted_Date','asc')->paginate(12);
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
        $jsongListCompact=DB::table('song')->where('songTitle','LIKE','%'.$searchSongTitle.'%')->paginate(12);
        $totalCount=DB::table('song')->where('songTitle','LIKE','%'.$searchSongTitle.'%')->count();
        if(count($jsongListCompact) > 0)
            {
                return view('SongListBlade',compact('jsongListCompact','totalCount'))->withDetails($jsongListCompact)->withQuery($searchSongTitle);
            }
        else
            {
                return view('SongListBlade',compact('jsongListCompact','totalCount'));
            }
    }

}

?>
