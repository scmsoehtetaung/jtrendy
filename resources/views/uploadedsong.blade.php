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
                          <div class="search" style="float:right; margin-button:15px" >
                            <form action="/searchsong" method="POST">
                                  @if(session()->has('searchtxt'))                               
                                  {{ session()->get('searchtxt') }}
                                  @endif                             
                                  {{ csrf_field() }}                             
                                  <input type="text"  name="searchtxt" autocomplete="off"
                                  placeholder="Search..." value="<?php echo isset($_POST["searchtxt"]) ? $_POST["searchtxt"] : ''; ?>" >                                
                                  <input type="submit" value="search"> 
                            </form>                          
                            <a href="{{ route('songcategory') }}">Search By Category</a>  
                          </div>                             
                        </div>  

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
                            @if($test=="upload")
                              {{ $songs->links() }}                        
                            @endif  
                          </div>  
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
   