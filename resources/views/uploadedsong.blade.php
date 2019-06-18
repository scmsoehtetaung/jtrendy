@extends('layouts.app')
<style>
.subcat-li,.subcat{
    margin-left:66px;
}
.subcat{
    margin-left:66px;
    height: 90px;
    word-wrap: break-word;
    width:300px;
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
    color: #D3D3D3;
}
.linkStyle {
    margin-left:965px;
    font-size: 16px;
}
</style>

@section('content')
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Uploaded Song</span>
            </div>
              <div class="panel-body">
                <div class="container">
                  <div class ="row">
                    <div class="row row justify-content-center">
                      <div class="col-9">
                        <div class="row">   
                          @if($test=="search" && count($songs) <= 0)
                            <div class="alert alert-danger">
                                <p>No Song!</p>
                            </div> 
                          @endif  

                          @if($test=="upload" && count($songs) <= 0)                 
                            <div class="alert alert-danger">
                              <p>No uploaded song!</p>
                            </div>
                          @endif     
                                                                       
                          <div class="search" style="float:right; margin-button:15px" >
                          <form action="/searchsong" method="POST" style="float:right">
                              {{ csrf_field() }}
                        <div class="btn-group">
                            <input class="form-control" type="search" name="searchtxt" autocomplete="off" id="myInput"
                                placeholder="Search...." value="<?php echo isset($_POST["searchtxt"]) ? $_POST["searchtxt"] : ''; ?>" >
                            <span id="searchclear" class="glyphicon glyphicon-remove-circle" onclick="document.getElementById('myInput').value = ''"></span>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="form-control" value="search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <div class="linkStyle">
                        <a href="{{ route('songcategory') }}">Search By Category</a>
                    </div>
                        </div>
                        </div>                  
                    
                            @foreach ($songs as $song)
                              <ul class="col-sm-4 list-unstyled" style="margin-top:15px">
                                <li class="subcat-li">                                   
                                  <video  width="300" height="200"  controls>
                                    <source src="{{URL::asset('videos/'.$song->video_path )}}" type="video/mp4">
                                  </video>                                    
                                </li>

                                <li class="subcat">
                                  <b>Song Title:&nbsp;&nbsp; </b>  {{$song->title}}<br>  
                                  <b>Artist:&nbsp;&nbsp;  </b>   {{ $song->artist}}<br> 
                                  <b>Category:&nbsp;&nbsp; </b>   {{$song->category}} </b>
                                </li>
                              </ul>
                            @endforeach
                                                                                                                                                                                                                                   
                      </div>             
                </div>
                          <div style="margin-left:550px">
                             {{$songs->appends(request()->except('page'))->links()}}            
                          </div>  
      </div>
    </div>
  </div>
</div>
@endsection
   