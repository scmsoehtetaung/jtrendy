@extends('layouts.app')
<style>
div a:hover {
    text-decoration:none;
    color: black;
}
#myInput {
    width: 200px;
}
#searchclear {
    position: absolute;
    right: 5px;
    top: 0;
    bottom: 0;
    height: 14px;
    margin: auto;
    font-size: 14px;
    cursor: pointer;
    color: gray;
}
.btnStyle11 {
    width: 62px;
    height: 35px;
}
.linkStyle {
    margin-left:965px;
    font-size: 16px;
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
                    <form action="/search" method="POST" style="float:right">
                    {{ csrf_field() }}
                        <div class="btn-group">
                            <input class="form-control" type="search" name="searchSongTitle" autocomplete="off" id="myInput"
                                placeholder="Search...." value="<?php echo isset($_POST["searchSongTitle"]) ? $_POST["searchSongTitle"] : ''; ?>" >
                            <span id="searchclear" class="glyphicon glyphicon-remove-circle" onclick="document.getElementById('myInput').value = ''"></span>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="form-control" value="search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <div class="linkStyle">
                        <a href="{{ route('songcategory') }}">Search By Category</a>
                    </div>
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
                            <p>Song does not exist.</p>
                        </div>
                    @endif
                    <form action="{{ url('/multiDel')}}" method="POST">
                    {{ csrf_field() }}
                    @if($totalCount!=0)
                        <button style="margin-bottom: 15px" class="btn btn-danger" type="submit" id="btnSubmit" onclick="return confirm('Are you sure to delete?')">Delete All Selected</button>                                                                                      
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
                                        <a href="{{  url('delete',$songInfo->id) }}" class="btn btn-danger btnStyle11" onclick="return confirm('Are you sure to delete?')">Delete</a>                                                
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
                        <div class="paginate text-center form-group">
                            {{ $jsongListCompact->appends(request()->except('page'))->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script language="javascript">

$(document).ready(function() {

    $("#selectall").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

});

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script>
 
 $(document).ready(function() { 
  
    $('#btnSubmit').attr("disabled",true);

    $('.multiDel_id').change(function() {
       $('#btnSubmit').attr('disabled', $('.multiDel_id:checked').length == 0);
    });
  
    $('#selectall').change(function() {
       $('#btnSubmit').attr('disabled', $('#selectall:checked').length == 0);
    });
  
 });
  
 </script>
 

