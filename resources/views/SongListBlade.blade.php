@extends('layouts.app')
<style>
    div a:hover {
        text-decoration:none;
        color: black;
    }
    .btnStyle00 {
  padding: 10px;
  height:35px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}
.btnStyle01 {
    float: left;
    width: 20%;
    height:35px;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none; 
    cursor: pointer;
    }
    .btnStyle01:hover {
    background: #0b7dda;
    }
    .btnStyle11 {
        width: 75px;
        height: 35px;
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
                    @if(session()->has('complete'))
                            <div class="alert alert-success">
                                {{ session()->get('complete') }}
                            </div>
                        @endif
                        @if(session()->has('searchSongTitle'))                               
                                        {{ session()->get('searchSongTitle') }}
                        @endif
                        @if(session()->has('multiDel_id'))                               
                                        {{ session()->get('multiDel_id') }}
                        @endif
                            <form action="/search" method="POST">
                            {{ csrf_field() }}
                            <div style="float:right">
                                <input class="btnStyle00" type="text"  name="searchSongTitle" autocomplete="off"
                                    placeholder="Search...." value="<?php echo isset($_POST["searchSongTitle"]) ? $_POST["searchSongTitle"] : ''; ?>" >                                
                                <button type="submit" class="btnStyle01" value="search"><i class="fa fa-search"></i></button> 
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
                            @if($totalCount!=0)
                                <button style="margin-bottom: 15px" class="btn btn-danger" type="submit">Delete All Selected</button>                                                                                      
                            @endif
                                <table style="width:100%" class="table table-bordered table-hover">
                                    <tr style="font-size:20px">
                                        <th><input type="checkbox" id="selectall"></th>
                                        <th>Song Title</th>
                                        <th>Like Count</th>
                                        <th>Artist</th>
                                        <th>Date</th>
                                        <th>Option</th>
                                    </tr>
                                    @if(count($jsongListCompact)>0)
                                    @foreach($jsongListCompact as $songInfo)
                                    <tr style="font-size:16px">
                                        <td><input type="checkbox" class="multiDel_id" name="multiDel_id[]" value="{{$songInfo->id}}"></td>
                                        <td><a href="{{ url('songlist/detail', $songInfo->id) }}" >{{$songInfo->title}}</td>
                                        <td>{{$songInfo->song_react_count}}</td> 
                                        <td>{{$songInfo->artist}}</td>
                                        <td>{{$songInfo->updated_at}}</td>
                                        <td>
                                            <div style="text-align:center">
                                                <a href="{{ url('updateSong',$songInfo->id) }}" class="btn btn-primary btnStyle11">Edit</a>
                                                <a href="{{  url('delete',$songInfo->id) }}" class="btn btn-danger btnStyle11">Delete</a>                                                
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<SCRIPT language="javascript">
$(function(){
	$("#selectall").click(function () {
		  $('.multiDel_id').attr('checked', this.checked);
	});

	$(".case").clik(function(){

		if($(".multiDel_id").length == $(".multiDel_id:checked").length) {
			$("#selectall").attr("checked", "checked");
		} else {
			$("#selectall").removeAttr("checked");
		}

	});
});
</SCRIPT>


