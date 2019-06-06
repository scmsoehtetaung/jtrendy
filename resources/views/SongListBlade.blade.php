@extends('layouts.app')
<style>
    #labelStyle00 {
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
                            @if(count($jsongListCompact) <= 0)
                            <div class="alert alert-danger">
                                <p>No data match your search.</p>
                            </div> 
                            @endif
                            <div class="block">
                                <label id="labelStyle00">Song Title</label>
                                <label id="labelStyle00">Artist</label>
                                <label id="labelStyle00">Date</label>
                                <label id="labelStyle00">Option</label>
                            </div>
                            @foreach($jsongListCompact as $songInfo) 
                            <div class="block">  
                                <label id="labelStyle00"><a href="{{ url('songlist/detail', $songInfo->id) }}" >{{$songInfo->title}}</a></label>                                                                                                               
                                <label id="labelStyle00">{{$songInfo->artist}} </label>
                                <label id="labelStyle00"> {{$songInfo->created_at}} </label>                           
                                <label id="labelStyle00"><button onclick="location.href='{{ url('updateSong',$songInfo->id) }}'" class="btn btn-info btn-sm">Edit</button>
                                    <button onclick="location.href='{{ url('delete',$songInfo->id) }}'" class="btn btn-danger btn-sm">Delete</button></label>                                                                                                            
                            </div>
                            @endforeach
                            <div class="paginate text-center">
                                    {{  $jsongListCompact->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
