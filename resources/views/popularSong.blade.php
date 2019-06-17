@extends('layouts.app')
<style>
.subcat-li,.subcat{
    margin-left:66px;
}
.subcat{
    width:220px;
    height:120px;
    word-wrap:break-word;
    margin-left:66px;
    font-weight:bold;
}
.panel-title{
    margin-left:10px;
}
video{
  box-shadow:3px 3px #d9d9d9;
  border:1px solid black;
}
</style>
@section('content')
<div>
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Popular Songs</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row">

                        <div class="row row justify-content-center">
                            <div class="col-9">
                                <div class="row">
                                    @foreach ($popular as $list)
                                    <ul class="col-sm-4 list-unstyled">
                                        <li class="subcat-li">
                                            <a href="{{url('popularSong/displayFullVdo',$list->id)}}" >
                                                <video  width="220" height="200"  controls>
                                                    <source src="{{URL::asset('videos/'.$list->video_path )}}" type="video/mp4">
                                                </video>
                                            </a>
                                        </li>
                                        <li class="subcat">
                                            <b>Song&nbsp;Title:&nbsp;{{ $list->title}}</b> 
                                            <b>  ( {{ $list->artist}}</b> )<br> 
                                            <b>Uploaded On: &nbsp;{{$list->updated_at}}</b><br>
                                            <b> {{$list->song_react_count}} &nbsp;users liked</b><br><br>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   
                   
