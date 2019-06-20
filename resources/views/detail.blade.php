@extends('layouts.app')
<style>

    label {
    width: 200px;
    text-align: left;
    font-size: 15px;
    margin-top:5px;
    }​

    .container1{
        width: 980px;     
    }

    .container1 .left{
        margin-top:5px;
        float: left;
        margin-top:5px;   
    }

    .container1 .right{
        margin-top:20px;
        float:left;
    }

    .button {
        width: 100px;
        background-color: #A0C6DA;
        color: #0B0B61;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-left: 200px;
        margin-top:30px;
    }

    .button1:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

</style>

@section('content')
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Song Detail</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                        @if($song->song_react_count ==$max && $song->song_react_count!='0')  
                            <div style="background-color:#CEF6EC;color:#21610B;padding:10px;width:40%;textalign:center;font-size:18px; box-shadow: 5px 10px #888888;">   
                                <strong>That's being most favourite song!!!</strong>
                            </div><br><br>
                        @endif 
                       
                        <div class="block">
                            <label>Song Title</label>
                            {{$song->title}}
                        </div>

                        <div class="block">
                            <label>Artist</label>
                            {{$song->artist}}
                        </div>

                        <div class="block">
                            <label> Category</label>
                            {{$song->category}}
                        </div>

                        <div class="block">
                            <label>Description</label>
                            {{$song->description}}
                        </div>

                        <div class="block">
                            <label>Favourite Count</label>
                            {{$song->song_react_count}}
                        </div>

                        <div class="block">
                            <label>Upload Date</label>
                            {{$song->created_at}}
                        </div>
                        
                        <div class="container1">
                            <div class="left">
                                <label>Upload Song</label>
                            </div>
                            
                            <div class="right">
                               <video width="400" controls>
                                    <source src="{{URL::asset('videos/'.$song->video_path )}}" type="video/mp4">
                                </video>
                            </div>                   
                        </div>        
                    </div>
                 <a href="javascript:history.back()" button class="btn button button1"><b>OK</b></a>
                </div>                         
            </div>
        </div>
    </div>

@endsection