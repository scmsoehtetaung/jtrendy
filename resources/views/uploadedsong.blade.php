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
                <span class="panel-title">J-trendy Dashboard</span>
            </div>
              <div class="panel-body">
                <div class="container">
                  <div class ="row">
                    <div class="row row justify-content-center">
                      <div class="col-9">
                        <div class="row">
                          @if(session()->has('searchSongTitle'))                               
                            {{ session()->get('searchSongTitle') }}
                          @endif
                          <div class="search" style="margin-left:1000px" >
                            <form action="/search" method="POST">
                              {{ csrf_field() }}
                                <div>
                                    <input type="text"  name="searchSongTitle" autocomplete="off"
                                      placeholder="Search..." value="<?php echo isset($_POST["searchSongTitle"]) ? $_POST["searchSongTitle"] : ''; ?>" >                                
                                    <input type="submit" value="search">                               
                                </div>
                            </form>
                          </div>

                          @if(count($songs) <= 0)
                          <div class="alert alert-danger">
                              <p>Details Not Found!Try Again!</p>
                          </div> 
                          @endif
                                  @foreach ($songs as $song)
                                    <ul class="col-sm-4 list-unstyled">
                                      <li class="subcat-li">
                                    
                                        <video  width="300" height="200"  controls>
                                          <source src="{{URL::asset('videos/'.$song->video_path )}}" type="video/mp4">
                                      </video>                                    
                                      </li>

                                      <li class="subcat">
                                        <b>Song Title: {{ $song->title}}  </b> 
                                        <b>  ( {{ $song->artist}}</b> )<br> 
                                        <b>Category: &nbsp;{{$song->category}} </b>
                                      </li>
                                    </ul>
                                  @endforeach
                        </div>
                            <div style="margin-left:550px">   
                             {{ $songs->links() }}
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
   