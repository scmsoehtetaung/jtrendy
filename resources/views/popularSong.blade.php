@extends('layouts.app')
<style>
.subcat-li,.subcat{
    margin-left:66px;
}
</style>
@section('content')
<div class="row">
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
                                            <b>Song Title: {{ $list->title}}</b> 
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
   
                   
