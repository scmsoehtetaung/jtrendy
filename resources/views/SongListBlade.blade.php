@extends('layouts.app')
<style>
    div a:hover {
        text-decoration:none;
        color: black;
        font-weight: bold;
    }
</style>
@section('content')
<div>
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">J-trendy Song List</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                        @if(session()->has('searchSongTitle'))                               
                                        {{ session()->get('searchSongTitle') }}
                        @endif
                        @if(session()->has('multiDel_id'))                               
                                        {{ session()->get('multiDel_id') }}
                        @endif
                            <form action="/search" method="POST">
                            {{ csrf_field() }}
                            <div style="float:right">
                                <input type="text"  name="searchSongTitle" autocomplete="off"
                                    placeholder="Search...." value="<?php echo isset($_POST["searchSongTitle"]) ? $_POST["searchSongTitle"] : ''; ?>" >                                
                                <input type="submit" value="search"> 
                            </div><br><br>
                            <div style="float:right">
                                <a href="{{ route('songcategory') }}">Search By Category</a>
                            </div>
                            </form>
                            <label for="total" style="font-size:22px">Total : {{$totalCount}}</label><br>
                            @if(session()->has('delete'))
                                <div class="alert alert-danger">
                                    {{ session()->get('delete') }}
                                </div>                                
                            @endif
                            @if(session()->has('del'))
                                <div class="alert alert-danger">
                                    {{ session()->get('del') }}
                                </div>                                
                            @endif
                            @if($song=="search" && $totalCount==0)
                                <div class="alert alert-danger">
                                    <p>No Song.</p>
                                </div>
                            @endif
                            <form action="{{ url('/multiDel')}}" method="POST">
                            {{ csrf_field() }}
                                <button style="margin-bottom: 15px" class="btn btn-danger" type="submit">Delete All Selected</button>                            
                               
                                <table style="width:100%" class="table table-bordered table-hover">
                                    <tr style="font-size:20px">
                                        <th>#</th>
                                        <th>Song Title</th>
                                        <th>Like Count</th>
                                        <th>Artist</th>
                                        <th>Date</th>
                                        <th>Option</th>
                                    </tr>
                                    @if(count($jsongListCompact)>0)
                                    @foreach($jsongListCompact as $songInfo)
                                    <tr style="font-size:16px">
                                        <td><input type="checkbox" class="sub_chk" name="multiDel_id[]" value="{{$songInfo->id}}"></td>   
                                        <td><a href="{{ url('songlist/detail', $songInfo->id) }}" >{{$songInfo->title}}</td>
                                        <td>{{$songInfo->song_react_count}}</td> 
                                        <td>{{$songInfo->artist}}</td>
                                        <td>{{$songInfo->updated_at}}</td>
                                        <td>
                                            <div style="text-align:center">
                                                <a href="{{ url('updateSong',$songInfo->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{  url('delete',$songInfo->id) }}" class="btn btn-danger">Delete</a>                                                
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if($song=="search" && $totalCount==0)
                                    <tr>
                                        <td colspan="6" class="text-center alert alert-danger">No song exist!</td>
                                    </tr>
                                    @endif
                                    @if($song=="list" && $totalCount==0)
                                    <tr>
                                        <td colspan="6" class="text-center alert alert-danger">No song exist!</td>
                                    </tr>
                                    @endif
                                </table>
                            </form> 
                            @if($song=="list")
                            <div class="paginate text-center">
                                {{ $jsongListCompact->links() }}
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection