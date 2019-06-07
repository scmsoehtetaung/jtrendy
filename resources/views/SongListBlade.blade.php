@extends('layouts.app')
<style>
    #labelStyle {
    width: 165px;
    text-align: left;
    font-size: 16px;
    margin-left: 105px;
    padding: 5px;
    }
    #labelStyle01 {
        margin-left:820px;
    }
    #labelStyle02 {
        margin-left:105px;
        font-size: 20px;
    }
</style>
@section('content')
<div class="row">
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
                            <form action="/search" method="POST">
                            {{ csrf_field() }}
                            <div id="labelStyle01">
                                <input type="text"  name="searchSongTitle" autocomplete="off"
                                        placeholder="Enter text...." value="<?php echo isset($_POST["searchSongTitle"]) ? $_POST["searchSongTitle"] : ''; ?>" >                                
                                <input type="submit" value="search">                      
                            </div>
                            </form><br>
                            <label for="total" id="labelStyle02">Total : {{$totalCount}}</label><br><br>
                            @if(session()->has('delete'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('delete') }}
                                    </div>
                            @endif
                            @if($song=="search" && $totalCount==0)
                            <div class="alert alert-danger">
                                <p>No data match your search.</p>
                            </div> 
                            @endif
                            <div class="block">
                                <label id="labelStyle">Song Title</label>
                                <label id="labelStyle">Artist</label>
                                <label id="labelStyle">Date</label>
                                <label id="labelStyle">Option</label>
                            </div>
                            @foreach($jsongListCompact as $songInfo) 
                            <div class="block">  
                                <label id="labelStyle"><a href="{{ url('songlist/detail', $songInfo->id) }}" >{{$songInfo->title}}</a></label>                                                                                                               
                                <label id="labelStyle">{{$songInfo->artist}} </label>
                                <label id="labelStyle"> {{$songInfo->created_at}} </label>                           
                                <label id="labelStyle">
                                    <button onclick="location.href='{{ url('updateSong',$songInfo->id) }}'" class="btn btn-info btn-sm">Edit</button>
                                    <button onclick="location.href='{{ url('delete',$songInfo->id) }}'" class="btn btn-danger btn-sm">Delete</button>
                                </label>                                                                                                            
                            </div>
                            @endforeach
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
