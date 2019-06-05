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
                            <div>
                                <input type="text"  name="searchSongTitle" autocomplete="off"
                                 placeholder="Enter text...." value="<?php echo isset($_POST["searchSongTitle"]) ? $_POST["searchSongTitle"] : ''; ?>" >                                
                                <input type="submit" value="search">                               
                            </div>
                        </form>
                        <label for="total">Total : {{$totalCount}}</label>
                        @if(session()->has('delete'))
                                <div class="alert alert-danger">
                                    {{ session()->get('delete') }}
                                </div>
                        @endif 
                        @if(count($jsongListCompact) <= 0)
                        <div class="alert alert-danger">
                            <p>Details Not Found!Try Again!</p>
                        </div> 
                        @endif
                    <table style="width:100%" border="1">
                        <tr>
                            <th>title</th>
                            <th>artist</th>
                            <th>created_at</th>
                            <th>option</th>
                        </tr>
                        <tr>
                        @foreach($jsongListCompact as $songInfo)                        
                            <td>{{$songInfo->title}}</td>
                            <td>{{$songInfo->artist}}</td>
                            <td>{{$songInfo->created_at}}</td>
                            <td>                           
                            <button onclick="location.href='{{ url('updateSong',$songInfo->id) }}'">Edit</button>
                            <button onclick="location.href='{{ url('delete',$songInfo->id) }}'">Delete</button>
                            </td>
                        </tr>
                        @endforeach                        
                    </table>                    
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
