@extends('layouts.app')

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
                            <div class="navbar-right">
                                <input type="text"  name="searchSongTitle" autocomplete="off"
                                        placeholder="Search...." value="<?php echo isset($_POST["searchSongTitle"]) ? $_POST["searchSongTitle"] : ''; ?>" >                                
                                <input type="submit" value="search"><br><br> 
                                <a href="{{ route('songtitle') }}">Search By Category...</a>                    
                            </div>
                            </form><br><br>
                            <label for="total" style="font-size:22px">Total : {{$totalCount}}</label><br><br>
                            @if(session()->has('delete'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('delete') }}
                                    </div>                                
                            @endif
                            @if($song=="search" && $totalCount==0)
                            <div class="alert alert-danger">
                                <p>No Song.</p>
                            </div>
                            @endif
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                            {{ session('message') }}
                            </div>
                            @endif
                            <table style="width:100%" class="table table-bordered table-hover">
                                <tr>
                                <th style="font-size:20px">Song Title</th>
                                <th style="font-size:20px">Like Count</th>
                                <th style="font-size:20px">Artist</th>
                                <th style="font-size:20px">Date</th>
                                <th style="font-size:20px">Option</th>
                                </tr>
                                @foreach($jsongListCompact as $songInfo)
                                <tr> 
                                    <td style="font-size:16px"><a href="{{ url('songlist/detail', $songInfo->id) }}" >{{$songInfo->title}}</td>
                                    <td style="font-size:16px">{{$songInfo->song_react_count}}</td> 
                                    <td style="font-size:16px">{{$songInfo->artist}}</td>
                                    <td style="font-size:16px">{{$songInfo->created_at}}</td>
                                    <td style="font-size:16px">
                                        <button onclick="location.href='{{ url('updateSong',$songInfo->id) }}'" class="btn btn-info">Edit</button>
                                        <button onclick="location.href='{{ url('delete',$songInfo->id) }}'" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                @if($song=="search" && $totalCount==0)
                                <tr>
                                    <td colspan="4" class="text-center alert alert-danger">No song exist!</td>
                                </tr>
                                @endif
                                @if($song=="list" && $totalCount==0)
                                <tr>
                                    <td colspan="4" class="text-center alert alert-danger">No song exist!</td>
                                </tr>
                                @endif
                            </table>
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
